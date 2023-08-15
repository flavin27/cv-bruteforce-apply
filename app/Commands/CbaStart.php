<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class CbaStart extends Command
{

    protected $signature = 'cba:start';


    protected $description = 'Inicia o programa';

    public function handle(): void
    {
        $this->info('Iniciando o processo CBA.');

        $inputFilePath = $this->ask('Digite o caminho para o arquivo de input:');

        if (!File::exists($inputFilePath)) {
             $this->error('O arquivo de input não existe.');

        }
        $emailList = File::get($inputFilePath);
        $emails = explode("\n", $emailList);






    }
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
