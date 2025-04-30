@extends('admin.inc.main')

@section('container')

<div class="addAppointment">
    <h2>Appointments Management</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>S.N</th>
                    <th>Customer</th>
                    <th>Technician</th>
                    <th>Service</th>
                    <th>Appointment Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $appointment->user->username ?? 'N/A' }}</td>

                    <td>{{ $appointment->employee->fullName ?? ($appointment->employee->first_name . ' ' . $appointment->employee->last_name) ?? 'N/A' }}</td>

                    <td>{{ $appointment->service->service_name ?? $appointment->service->name ?? 'N/A' }}</td>

                    <td>{{ $appointment->appointment_date }}</td>

                    <td>{{ $appointment->appointment_time }}</td>

                    <td>
                        <span class="badge 
                            @if($appointment->status == 'Confirmed') badge-success 
                            @elseif($appointment->status == 'Completed') badge-primary 
                            @elseif($appointment->status == 'Cancelled') badge-danger 
                            @elseif($appointment->status == 'Time exceeded') badge-danger 
                            @endif
                        ">
                            {{ $appointment->status }}
                        </span>
                    </td>

                    <td>NPR {{ number_format($appointment->price, 2) }}</td>

                    <td>
                        <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this appointment?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
