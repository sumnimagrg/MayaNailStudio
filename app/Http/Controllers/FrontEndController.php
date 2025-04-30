<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ServiceCategory;
use App\Models\Services;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::all();
        $serviceCategories = ServiceCategory::with('services')->get();

        return view('MayaNailStudio.home', compact('employees', 'serviceCategories'));
    }
    public function team()
    {
        $employees = Employee::all();
        return view('MayaNailStudio.team', compact('employees'));
    }
    public function selectEmp()
    {
        $employees = Employee::all();
        return view('MayaNailStudio.selectEmp', compact('employees'));
    }
    public function services()
    {
        $services = Services::all();
        return view('MayaNailStudio.ourService', compact('services'));
    }
    public function selectSer()
    {
        $services = Services::all();
        $employees = Employee::all();
        return view('MayaNailStudio.book', compact('services', 'employees'));
    }
}
