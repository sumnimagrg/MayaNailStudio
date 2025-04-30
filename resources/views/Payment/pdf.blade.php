<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid #e3e3e3;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
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
        .button-container {
            margin-top: 30px;
            text-align: center;
        }
        .team-btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="heading-success">Payment Successful!</h2>
    <p class="text-center-paragraph">
        Thank you for booking with <strong>MAYA NAIL STUDIO</strong>.
    </p>

    <hr>

    <h4 class="section-heading">Appointment Details</h4>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Service ID:</strong> {{ $payment->appointment->service_id ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Employee ID:</strong> {{ $payment->appointment->employee_id ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Date:</strong> {{ $payment->appointment->appointment_date ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Time:</strong> {{ $payment->appointment->appointment_time ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($payment->appointment->status) ?? 'N/A' }}</li>
    </ul>

    <h4 class="section-heading">Payment Info</h4>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Transaction Code:</strong> {{ $payment->transaction_code }}</li>
        <li class="list-group-item"><strong>Amount Paid:</strong> NPR {{ number_format($payment->amount, 2) }}</li>
        <li class="list-group-item"><strong>Method:</strong> {{ ucfirst($payment->method) }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($payment->status) }}</li>
        <li class="list-group-item"><strong>Payment Date:</strong> {{ $payment->payment_date }}</li>
    </ul>

    <div class="button-container">
        <p style="font-size: 16px;">Thank you for choosing Maya Nail Studio!</p>
    </div>
</div>

</body>
</html>
