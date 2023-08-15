<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class CbaStart extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'app:cba-start';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Inicia o programa';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $option = $this->menu('Pizza menu', [
            'Freshly baked muffins',
            'Freshly baked croissants',
            'Turnovers, crumb cake, cinnamon buns, scones',
        ])->open();
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
