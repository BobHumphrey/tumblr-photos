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
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\TumblrUpdate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')->hourly();

        $schedule->command('app:update')->dailyAt('03:18');
        $schedule->command('app:update')->dailyAt('07:18');
        $schedule->command('app:update')->dailyAt('11:18');
        $schedule->command('app:update')->dailyAt('15:18');
        $schedule->command('app:update')->dailyAt('19:18');
        $schedule->command('app:update')->dailyAt('23:18');
    }
}
