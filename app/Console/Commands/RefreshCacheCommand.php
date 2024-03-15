<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-cache-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is command for refreshing config, routes and view files';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('config:cache');
        $this->call('route:cache');
        $this->call('view:cache');
        $this->info('Кэш был обновлён');
    }
}
