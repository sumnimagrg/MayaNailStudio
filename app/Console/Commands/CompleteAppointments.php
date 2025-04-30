<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;
use Carbon\Carbon;

class CompleteAppointments extends Command
{
    protected $signature = 'appointments:complete'; // <-- THIS defines the artisan command
    protected $description = 'Mark past appointments as completed and reward users';

    public function handle()
    {
        $now = Carbon::now();

        $appointments = Appointment::where('status', 'Confirmed')
            ->whereDate('appointment_date', '<=', $now->toDateString())
            ->whereTime('appointment_time', '<=', $now->format('H:i'))
            ->get();

        foreach ($appointments as $appointment) {
            $appointment->update(['status' => 'Completed']);
            if ($appointment->user) {
                $appointment->user->increment('reward_points', 100);
            }
        }

        $this->info('Appointments updated to completed and reward points added.');
    }
}
