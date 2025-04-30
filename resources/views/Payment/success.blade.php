@extends('layouts.main')
@section('container')

<style>
.container {
    max-width: 700px;
    margin: 50px auto;
    font-family: 'Segoe UI', sans-serif;
}

.card {
    background-color: #ffffff;
    border-radius: 12px;
    border: 1px solid #e3e3e3;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    padding: 30px;
}

.heading-success {
    color: #28a745;
    font-size: 26px;
    text-align: center;
    margin-bottom: 10px;
}

.text-center-paragraph {
    font-size: 16px;
    color: black;
    text-align: center;
}

hr {
    margin: 25px 0;
    border: 0;
    border-top: 1px solid #ddd;
}

.section-heading {
    font-size: 18px;
    color: #333;
    margin-bottom: 15px;
    margin-top: 20px;
}

.list-group {
    padding: 0;
    list-style: none;
}

.list-group-item {
    font-size: 15px;
    background-color: #f8f9fa;
    border: none;
    padding: 12px 18px;
    margin-bottom: 6px;
    border-radius: 6px;
    color: #444;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.list-group-item strong {
    color: #333;
    width: 40%;
}


</style>

<div class="container">
    <div class="card">
        <h2 class="heading-success">Payment Successful!</h2>
        <p class="text-center-paragraph">
            Thank you for booking with <strong>MAYA NAIL STUDIO</strong>.
        </p>

        <hr>

        <h4 class="section-heading">Appointment Details</h4>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Service ID:</strong> {{ $appointment->service_id }}</li>
            <li class="list-group-item"><strong>Employee ID:</strong> {{ $appointment->employee_id }}</li>
            <li class="list-group-item"><strong>Date:</strong> {{ $appointment->appointment_date }}</li>
            <li class="list-group-item"><strong>Time:</strong> {{ $appointment->appointment_time }}</li>
            <li class="list-group-item"><strong>Status:</strong> {{ $appointment->status }}</li>
        </ul>

        <h4 class="section-heading">Payment Info</h4>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Transaction Code:</strong> {{ $payment->transaction_code }}</li>
            <li class="list-group-item"><strong>Amount Paid:</strong> NPR {{ number_format($payment->amount, 2) }}</li>
            <li class="list-group-item"><strong>Method:</strong> {{ ucfirst($payment->method) }}</li>
            <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($payment->status) }}</li>
            <li class="list-group-item"><strong>Payment Date:</strong> {{ $payment->payment_date }}</li>
        </ul>
<br>
        <div class="text-center">
            <a href="{{ route('book') }}" class="team-btn">Book Another Appointment</a> 
            <a href="{{ route('review') }}" class="team-btn">Leave Review</a>
        </div> 
        <br>
        <div class="text-center mt-4">
            <a href="{{ route('payment.download', $payment->id) }}" class="team-btn">
                Download Payment Receipt (PDF)
            </a>
        </div>
        
    </div>
</div>

@endsection
