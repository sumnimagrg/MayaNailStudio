<?php

namespace App\Http\Controllers;


use App\Models\ServiceCategory;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $serviceCategory = Services::with('serviceCategory')->get();
        return view('admin.pages.servicess.create', compact('serviceCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = Services::all();
        $serviceCategories = ServiceCategory::all();
        return view('admin.pages.servicess.create', compact('services', 'serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $services = new Services();
        $request->validate([
            'service_name' => ['required', 'string', 'max:255'],
            'service_desc' => ['required', 'string', 'max:255'],
            'service_category' => ['required', 'string', 'max:12'],
            'duration' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = Str::slug($request->first_name) . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $services->service_name = $request->service_name;
        $services->service_desc = $request->service_desc;
        $services->service_category = $request->service_category;
        $services->duration = $request->duration;
        $services->price = $request->price;
        $services->image = $fileName;
        $services->save();
        return redirect('/services/create')->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        // $services = Services::all();
        $serviceCategories = ServiceCategory::all();
        // $services = services::query()->where('id', $id)->get()->first();
        $services = Services::findOrFail($id);
        return view('admin.pages.servicess.edit', compact('services', 'serviceCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $services = Services::query()->where('id', $id)->get()->first();
        $request->validate([
            'service_name' => ['required', 'string', 'max:255'],
            'service_desc' => ['required', 'string', 'max:255'],
            'service_category' => ['required', 'integer', 'exists:service_categories,id'],
            'duration' => ['required', 'string', 'max:255'],
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'price' => ['required', 'string', 'max:255'],
        ]);
        $services->service_name = $request->service_name;
        $services->service_desc = $request->service_desc;
        $services->service_category = $request->service_category;
        $services->duration = $request->duration;
        $services->price = $request->price;
        if ($request->image) {
            $fileName = Str::slug($request->first_name) . '-' . time() . '.' . $request->image->extension();
            unlink(public_path('uploads/' . $services->image));
            $request->image->move(public_path('uploads/'), $fileName);
            $services->image = $fileName;
        }
        $services->update();
        return redirect('/services/create')->with('message', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $services = services::query()->where('id', $id)->get()->first();

        $services->delete();
        return redirect('admin/services')->with('message', 'Deleted Successfully');
    }
}
