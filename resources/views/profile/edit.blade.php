<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        
    <a href="/">Home</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

 <!-- End Appointment History Section -->
 <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <h2 class="text-lg font-medium text-gray-900 mb-2">Reward Points</h2>
    <p class="text-gray-700">
        You have collected 
        <span class="font-bold text-green-600">{{ Auth::user()->reward_points ?? 0 }}</span> reward points.
    </p>
</div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Appointment History</h2>

                @if(session('error'))
                    <div class="mb-4 text-red-600">{{ session('error') }}</div>
                @endif

                @if(session('message'))
                    <div class="mb-4 text-green-600">{{ session('message') }}</div>
                @endif

                <table class="w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Service</th>
                            <th class="border px-4 py-2">Employee</th>
                            <th class="border px-4 py-2">Date</th>
                            <th class="border px-4 py-2">Time</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(Auth::user()->appointments()->with(['service', 'employee'])->latest()->get() as $appointment)
                            <tr>
                                <td class="border px-4 py-2">{{ $appointment->service->service_name }}</td>
                                <td class="border px-4 py-2">{{ $appointment->employee->fullName }}</td>
                                <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                <td class="border px-4 py-2">{{ $appointment->appointment_time }}</td>
                                <td class="border px-4 py-2">{{ $appointment->status }}</td>
                                <td class="border px-4 py-2">
                                    @if($appointment->status === 'Confirmed')
                                    @if(now()->toDateString() < $appointment->appointment_date || 
                                        (now()->toDateString() == $appointment->appointment_date && now()->format('H:i') < $appointment->appointment_time))
                                        <form method="POST" action="{{ route('appointment.cancel', $appointment->id) }}">
                                            @csrf
                                            <button class="inline-flex items-center px-3 py-1 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700 transition-all duration-200">
                                                Cancel
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-red-600 font-semibold">Time Exceeded</span>
                                    @endif
                            
                                @elseif($appointment->status === 'Cancelled')
                                    <span class="text-yellow-600 font-semibold">Cancelled</span>
                            
                                @elseif($appointment->status === 'Completed')
                                    <span class="text-green-600 font-semibold">Completed</span>
                            
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                                </td>
                                
                        @empty
                            <tr>
                                <td colspan="6" class="text-center px-4 py-2">No Appointments Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- End Appointment History Section -->

        </div>
    </div>
</x-app-layout>
