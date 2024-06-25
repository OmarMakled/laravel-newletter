<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessCampaignsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaigns:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process campaigns based on scheduled time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Processing campaigns...');
    }
}
