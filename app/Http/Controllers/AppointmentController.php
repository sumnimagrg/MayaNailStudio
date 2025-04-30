<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Services;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $appointments = Appointment::with(['user', 'employee', 'service'])->latest()->get();

        return view('admin.pages.Appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}
    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    //APPOINTMENT DETAILS
    public function selectService()
    {
        $services = Services::all();
        $employees = Employee::all();
        return view('MayaNailStudio.book', compact('services', 'employees'));
    }
    public function storeService(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'employee_id' => 'required|exists:employees,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        $userId = Auth::id();

        $time = Carbon::createFromFormat('H:i', $request->appointment_time);
        if ($time->lt(Carbon::createFromTime(11, 0)) || $time->gt(Carbon::createFromTime(16, 0))) {
            return redirect()->back()->with('error', 'Time must be between 11:00 and 16:00.');
        }


        $hasActive = Appointment::where('user_id', $userId)
            ->whereIn('status', ['Pending', 'Confirmed'])
            ->exists();

        if ($hasActive) {
            return redirect()->back()->with('error', 'You already have an ongoing appointment.');
        }
        $service = Services::find($request->service_id);

        session([
            'appointment_data' => [
                'user_id' => Auth::id(),
                'service_id' => $request->service_id,
                'employee_id' => $request->employee_id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
                'is_prepaid' => true,
                'status' => 'pending',
                'total_price' => Services::find($request->service_id)->price,
            ]
        ]);

        return redirect()->route('esewa.pay');
    }

    public function finalizeAppointment(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'employee_id' => 'required|exists:employees,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        $time = Carbon::createFromFormat('H:i', $request->appointment_time);
        if ($time->lt(Carbon::createFromTime(11, 0)) || $time->gt(Carbon::createFromTime(16, 0))) {
            return redirect()->back()->with('error', 'Time must be between 11:00 and 4:00.');
        }

        // one employee at one time
        $employeeTaken = Appointment::where('employee_id', $request->employee_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->whereIn('status', ['Confirmed'])
            ->exists();

        // user can only book one appoinment unless its completed
        if ($employeeTaken) {
            return redirect()->back()->with('error', 'This employee is already booked at that time. Please choose another.');
        }

        $service = Services::find($request->service_id);
        $price = $service->price ?? 0;
        $redeemPoints = (int) $request->input('redeem_points', 0);
        $userPoints = Auth::user()->reward_points;

        if ($redeemPoints > $userPoints) {
            return redirect()->back()->with('error', 'You entered more reward points than you have.');
        }

        if ($redeemPoints >= 100 && $redeemPoints <= $userPoints) {
            $discountPercent = floor($redeemPoints / 100) * 10; // 100 points = 10%
            $price = $price - ($price * $discountPercent / 100);
        }

        session([
            'appointment_data' => [
                'user_id' => Auth::id(),
                'service_id' => $request->service_id,
                'employee_id' => $request->employee_id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
                'is_prepaid' => true,
                'status' => 'pending',
                'total_price' => $price,
                'used_reward_points' => $redeemPoints,
            ]
        ]);

        return redirect()->route('esewa.pay');
    }

    public function cancel($id)
    {
        $appointment = Appointment::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if (!in_array($appointment->status, ['Confirmed'])) {
            return back()->with('error', 'Only confirmed appointments can be cancelled.');
        }

        $now = now();
        $appointmentTime = Carbon::parse("{$appointment->appointment_date} {$appointment->appointment_time}");

        // Allow cancellation up to 2 hours before the appointment
        if ($appointmentTime->diffInMinutes($now, false) > -120) {
            return back()->with('error', 'Cancellations must be made at least 2 hours in advance.');
        }

        $appointment->update(['status' => 'Cancelled']);

        return back()->with('message', 'Appointment cancelled. Refund is being processed.');
    }


    //APPOINTMENT DETAILS  END



    public function edit($id)
    {
        //
        $appointment = Appointment::findOrFail($id);
        $users = User::all();
        $employees = Employee::all();
        $services = Services::all();
        return view('admin.pages.appointment.edit', compact('appointment', 'users', 'employees', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $appointment = Appointment::query()->where('id', $id)->get()->first();

        $request->validate([
            'appointment_date' => 'required|date',
            'status' => 'required|string|max:255',
            'is_prepaid' => 'required|boolean',
            'duration' => 'required|string|max:255',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'employee_id' => 'required|exists:employees,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $appointment->update($request->all());
        return redirect()->route('appointment.index')->with('message', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $appointment = Appointment::query()->where('id', $id)->get()->first();

        $appointment->delete();
        return redirect('appointment.index')->with('message', 'Deleted Successfully');
    }
}
