<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Monolog\Logger;

class addToLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:addToLog {message} {message2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is my custom function to add to logs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $message = $this->argument('message');
        $message2 = $this->argument('message2');
        logger($message ." -". $message2 );
    }
}
