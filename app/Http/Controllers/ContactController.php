<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\Appointment;
use App\Models\EmailMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function sendMessage(Request $request)
    {

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to send a message.');
        }

        $user = Auth::user();

        // Check if user has a confirmed appointment
        $user = Auth::user();
        $hasAppointment = Appointment::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->exists();

        if (!$hasAppointment) {
            return redirect()->back()->with('error', 'Only users with a confirmed appointment can send a message.');
        }

        // validation for sending mail and storing in db
        $validated = $request->only(['name', 'email', 'phone', 'message']);

        // Store in DB
        EmailMessage::create($validated);

        // Send mail
        Mail::to('sumnima.gurung.s23@icp.edu.np')->send(new ContactMessageMail($validated));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
