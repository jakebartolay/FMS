<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use App\Models\Account;
use App\Models\DepositRequest;
use App\Models\Vendorsuser;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            User::whereNull('id')->delete();
        })->everyMinute();

        $schedule->call(function(){
            Account::where('status_id', '=', '9')->update();
        })->everyMinute();

        $schedule->call(function(){
            depositrequest::where('status', '=', '9')->update();
        })->everyMinute();

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
