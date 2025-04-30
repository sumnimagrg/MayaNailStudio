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

/* eSewa Styled Button */
.btn-esewa {
    display: inline-block;
    background-color: #28a745;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.2s ease-in-out;
}

.btn-esewa:hover {
    background-color: #28a745;
}
</style>

<div class="container">
    <div class="card">
        <h2 class="heading-success">Payment Failed!</h2>
        <p class="text-center-paragraph">
            Please Try Again!<strong>-MAYA NAIL STUDIO</strong>.
        </p>

        <div class="text-center">
            <a href="{{ route('book') }}" class="btn-esewa">Book Another Appointment</a>
        </div>
    </div>
</div>

@endsection
