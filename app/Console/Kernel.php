<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Harmonogram;
use App\Models\Tracker;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $today = Carbon::now();
            $day = $today->day;
            $harmonograms = Harmonogram::where('day', $day)->get();
            

            foreach ($harmonograms as $harmonogram) {
                $tracker = new Tracker();
                $tracker->user_id = $harmonogram->user_id;
                $tracker->category_id = $harmonogram->category_id;
                $tracker->group_id = $harmonogram->group_id;
                $tracker->amount = $harmonogram->amount;
                $tracker->title = $harmonogram->title;
                $tracker->date = Carbon::now();
                $tracker->save();
            }
        })->dailyAt('13:00');;
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
