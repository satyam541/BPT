<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sendIncompleteEnquiry')
                 ->everyFifteenMinutes();
        // $schedule->call(function(){
        //     $curl = curl_init();
        //     curl_setopt ($curl, CURLOPT_URL, route('updateExchangeRate'));
        //     curl_exec ($curl);
        //     curl_close ($curl);
        // })  ->dailyAt("00:00")
        //     ->timezone('Europe/London');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
