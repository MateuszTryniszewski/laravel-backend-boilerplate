<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Planer;
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
            // Pobierz wpisy z tabeli harmonogram, które mają wartość `generate_invoice` ustawioną na `1`
            $today = Carbon::now();
            $day = $today->day;
            $harmonograms = Planer::where('day', $day)->get();
            
            // Iteruj przez każdy wpis w tabeli harmonogram i utwórz nowy wpis w trackerze
            foreach ($harmonograms as $harmonogram) {
                $invoice = new Tracker();
                $invoice->user_id = $harmonogram->user_id;
                $invoice->amount = $harmonogram->amount;
                $invoice->issue_date = Carbon::now();
                $invoice->save();
                
                // Oznacz wpis w tabeli harmonogram jako przetworzony
                // $harmonogram->generate_invoice = 0;
                $harmonogram->save();
            }
        })->daily();
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
