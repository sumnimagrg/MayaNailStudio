<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = ServiceCategory::all();
        return view('admin.pages.ServiceCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $serviceCategory = new ServiceCategory();
        $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'category_desc' => ['required', 'string', 'max:500'],
            'category_img' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = Str::slug($request->category_name) . '-' . time() . '.' . $request->category_img->extension();
        $request->category_img->move(public_path('uploads/'), $fileName);

        $category = new ServiceCategory();
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->category_img = $fileName;
        $category->save();

        return redirect()->route('serviceCategory.create')->with('message', 'Service Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        // Retrieve all images for selection in the edit view
        $serviceCategory = ServiceCategory::query()->where('id', $id)->get()->first();
        return view('admin.pages.ServiceCategory.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'category_desc' => ['required', 'string', 'max:500'],
            'category_img' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);
        $category = new ServiceCategory();
        $category = $category->where('id', $id)->get()->first();

        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        if ($request->category_img) {
            $fileName = Str::slug($request->first_name) . '-' . time() . '.' . $request->category_img->extension();
            unlink(public_path('uploads/' . $category->category_img));
            $request->category_img->move(public_path('uploads/'), $fileName);
            $category->category_img = $fileName;
        }
        $category->update();

        return redirect()->route('serviceCategory.create')->with('message', 'Service Category Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $serviceCategory = ServiceCategory::query()->where('id', $id)->get()->first();

        $serviceCategory->delete();
        return redirect('admin/serviceCategory')->with('message', 'Deleted Successfully');
    }
}
