<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.pages.employees.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $employee = new Employee();
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'rating' => 'required|string',
            'bio' => ['required', 'string', 'max:255'],
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = Str::slug($request->fullName) . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $employee->fullName = $request->fullName;
        $employee->rating = $request->rating;
        $employee->bio = $request->bio;
        $employee->image = $fileName;
        $employee->save();
        return redirect('/employee/create')->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Retrieve all images for selection in the edit view
        $employee = employee::query()->where('id', $id)->get()->first();
        return view('admin.Pages.Employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // dd($request);
        $employee = Employee::query()->where('id', $id)->get()->first();
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'rating' => 'required|string',
            'bio' => ['required', 'string', 'max:255'],
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);



        $employee->fullName = $request->fullName;
        $employee->rating = $request->rating;
        $employee->bio = $request->bio;
        if ($request->image) {
            $fileName = Str::slug($request->first_name) . '-' . time() . '.' . $request->image->extension();
            unlink(public_path('uploads/' . $employee->image));
            $request->image->move(public_path('uploads/'), $fileName);
            $employee->image = $fileName;
        }

        $employee->update();
        return redirect('/employee/create')->with('message', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = employee::query()->where('id', $id)->get()->first();

        $employee->delete();
        return redirect('admin/employee')->with('message', 'Deleted Successfully');
    }
}
