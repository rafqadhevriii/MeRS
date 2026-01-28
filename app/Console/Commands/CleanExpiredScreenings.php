<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Screening;

class CleanExpiredScreenings extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'mers:clean-expired';

    /**
     * The console command description.
     */
    protected $description = 'Delete expired MeRS screening data (over 30 days old)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $count = Screening::where('expires_at', '<', now())->count();

        Screening::where('expires_at', '<', now())->delete();

        $this->info("Deleted {$count} expired screening records.");

        return Command::SUCCESS;
    }
}
