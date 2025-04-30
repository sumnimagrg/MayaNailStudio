@extends('layouts.main')
@section('container')

@if(session('error'))
    <div class="alert alert-danger" style="background: #ffe6e6; color: #a94442; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
        {{ session('error') }}
    </div>
@endif

<h2>Book An Appointment</h2>
<div class="booking-container">
    <h2>Select a Service</h2>
  <form id="bookingForm" method="POST" action="{{ route('appointment.finalize') }}">
    @csrf
    <input type="hidden" name="service_id" id="formService">
    <input type="hidden" name="employee_id" id="formEmployee">
    <input type="hidden" name="appointment_date" id="formDate">
    <input type="hidden" name="appointment_time" id="formTime">

    {{-- selecting service --}}
    @foreach ($services as $service)
        <label>
            <div class="service-cards">
                <div class="service-header">
                    <input type="radio" name="service_radio" value="{{ $service->id }}" 
                           data-name="{{ $service->service_name }}" 
                           data-price="{{ $service->price }}">
                    <span>{{ $service->service_name }}</span>
                    <span>NPR {{ $service->price }}</span>
                </div>
            </div>
        </label>
    @endforeach

    {{-- employee selection --}}
    <h2>Select an Employee</h2>
    <select id="employeeSelect" class="form-control">
        <option value="">-- Choose Employee --</option>
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}" data-name="{{ $employee->fullName }}">{{ $employee->fullName }}</option>
        @endforeach
    </select>

    {{-- datentime --}}
    <h2>Select Date & Time</h2>
    <label for="appointmentDate">SELECT DATE</label><br>
    <div class="inputContainer">
        <input type="date" id="appointmentDate" name="appointment_date" class="form-control" required />
        <i class="far fa-calendar-alt"></i>
    </div>

    <label for="appointmentTime">SELECT TIME</label>
    <div class="inputContainer">
        {{-- 900 sec = 15min --}}
        <input type="time" id="appointmentTime" name="appointment_time"
        class="form-control"
        min="11:00" max="16:00" step="900" required />
        <i class="far fa-clock"></i>
    </div>
    
    @if(Auth::user()->reward_points > 0)
    <div style="margin-top: 20px;">
        <label for="redeem_points">Redeem your points for a discount:</label>
        <input type="number" name="redeem_points" id="redeem_points" min="0" max="{{ Auth::user()->reward_points }}" class="form-control" placeholder="Enter reward points" />
        <small>You have {{ Auth::user()->reward_points }} points. 100 points = 10% discount.</small>
    </div>
    @endif
    


    <div class="booking-summary mt-4">
        <div class="summary p-3 border rounded">
            <div class="summary-header"><strong>MAYA NAIL STUDIO</strong></div>
            <div class="summary-details">
                Pokhara, Lakeside - 16<br/>
                <span class="stars">⭐⭐⭐⭐⭐</span>
                <br><br>
                <div><strong>Service:</strong> <span id="summaryService">--</span></div>
                <div><strong>Technician:</strong> <span id="summaryEmployee">--</span></div>
                <div><strong>Date:</strong> <span id="summaryDate">--</span></div>
                <div><strong>Time:</strong> <span id="summaryTime">--</span></div>
            </div>
            <hr>
            <div class="total mt-2 d-flex justify-content-between">
                <strong>Total</strong>
                NPR. <span id="totalPrice">0</span>
            </div> <br>
            <button type="submit" class="btn-esewa">Confirm & Pay</button>
        </div>
    </div>
  </form>
</div>

<script>
    document.querySelectorAll('input[name="service_radio"]').forEach(radio => {
        radio.addEventListener('change', function () {
            document.getElementById('formService').value = this.value;
            document.getElementById('summaryService').textContent = this.dataset.name;
            document.getElementById('totalPrice').textContent = this.dataset.price;
        });
    });

    document.getElementById('employeeSelect').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        document.getElementById('formEmployee').value = this.value;
        document.getElementById('summaryEmployee').textContent = selected.dataset.name || '--';
    });

    document.getElementById('appointmentDate').addEventListener('change', function () {
        document.getElementById('formDate').value = this.value;
        document.getElementById('summaryDate').textContent = this.value;
    });

    document.getElementById('appointmentTime').addEventListener('change', function () {
        document.getElementById('formTime').value = this.value;
        document.getElementById('summaryTime').textContent = this.value;
    });
</script>

@endsection
