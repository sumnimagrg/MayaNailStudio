{{-- @extends('layouts.main')
@section('container')

<div class="container text-center">
    <h2> Payment Successful!</h2>
    <p><strong>Transaction Code:</strong> {{ $payment->transaction_code }}</p>
    <p><strong>Amount Paid:</strong> NPR. {{ $payment->amount }}</p>
    <p><strong>Service:</strong> {{ $payment->appointment->service->service_name }}</p>
    <p><strong>Date:</strong> {{ $payment->appointment->appointment_date }}</p>
    <p><strong>Time:</strong> {{ $payment->appointment->appointment_time }}</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>

@endsection --}}
