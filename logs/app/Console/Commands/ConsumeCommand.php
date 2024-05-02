<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConsumeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $consumer = new \App\Services\ConsumeService();
        $consumer->main();
    }
}
