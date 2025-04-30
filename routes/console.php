<?php

use App\Console\Commands\AutoCompleteAppointments;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Artisan::command('schedule:setup', function (Schedule $schedule) {
//     $schedule->command(AutoCompleteAppointments::class)->everyMinute();
// });
