@extends('admin.inc.main')

@section('container')    

<div class="dashboard-card">
    <div class="card">
        <h3>Total Users</h3>
        <p>{{ $totalUsers }}</p>
    </div> 
    <br>

    <div class="card">
        <h3>Total Appointments</h3>
        <p>{{ $totalAppointments }}</p>
    </div> 
    <br>

    <div class="card">
        <h3>Total Services</h3>
        <p>{{ $totalServices }}</p>
    </div> 
    <br>

    <div class="card">
        <h3>Total Employees</h3>
        <p>{{ $totalEmployees }}</p>
    </div>            
</div>

@endsection
