<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PortofolioImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortofolioImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = PortofolioImages::with('employee')->latest()->get();
        $employees = Employee::all();

        // dd($employees);
        return view('admin.Pages.PortofolioImages.index', compact('images', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.Pages.PortofolioImages.index', compact('employees'));
    }

    /**
     * Store newly uploaded images.
     */
    public function store(Request $request)
    {

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB max per image
        ], [
            'employee_id.required' => 'Please select an employee.',
            'images.required' => 'Please upload at least one image.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Images must be JPG, JPEG, PNG, or WEBP.',
            'images.*.max' => 'Each image must be less than 2MB.',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $employee = Employee::find($request->employee_id);

                $fileName = Str::slug($employee->name) . '-' . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/'), $fileName);


                PortofolioImages::create([
                    'employee_id' => $employee->id,
                    'image_url' => 'uploads/' . $fileName
                ]);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }

    /**
     * Display the specified image.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing an image (not required for multiple uploads).
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove an image.
     */
    public function destroy(string $id)
    {
        $portofolioImage = PortofolioImages::find($id);

        if (!$portofolioImage) {
            return redirect()->back()->with('error', 'Image not found.');
        }

        // Construct the full path to the image
        $imagePath = public_path($portofolioImage->image_url);

        // Check if the file exists before attempting to delete
        if (file_exists($imagePath)) {
            unlink($imagePath);
        } else {
            // Log or handle the case where the file doesn't exist
            return redirect()->back()->with('error', 'Image file does not exist.');
        }

        $portofolioImage->delete();

        return redirect()->back()->with('message', 'Deleted successfully!');
    }
    // userside
    public function showPortfolio($id)
    {
        $employee = Employee::findOrFail($id);
        $images = PortofolioImages::where('employee_id', $id)->latest()->get();

        return view('MayaNailStudio.portfolio', compact('images', 'employee'));
    }
}
