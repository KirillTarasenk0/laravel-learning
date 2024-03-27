<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearLogsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-logs-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will be used for clearing logs';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        File::delete(File::files(storage_path('logs')));
        $this->info('Логи были успешно очищены');
    }
}
