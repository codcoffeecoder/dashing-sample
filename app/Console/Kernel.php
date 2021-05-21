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
    use \Wikichua\Dashing\Http\Traits\ArtisanTrait;
    protected $commands_disabled = [
        'production' => ['migrate:refresh','migrate:reset','dashing:install'],
    ];
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
        $schedule->command('migrate:fresh', ['--force','--quiet'])->everyFiveMinutes();
        $schedule->command('dashing:run:report', ['--force','--quiet'])->everyFiveMinutes();
        $this->runCronjobs($schedule);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->disableCommands();
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
