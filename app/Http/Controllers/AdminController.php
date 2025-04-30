<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalAppointments = Appointment::count();
        $totalServices = Services::count();
        $totalEmployees = Employee::count();

        return view('admin.dashboard', compact('totalUsers', 'totalAppointments', 'totalServices', 'totalEmployees'));
    }
}
