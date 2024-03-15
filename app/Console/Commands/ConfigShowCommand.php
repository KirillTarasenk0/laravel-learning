<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConfigShowCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:config-show-command {configKey}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command was created for showing configs info';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if (config($this->argument('configKey'))) {
            $this->info(config($this->argument('configKey')));
        } else {
            $this->info('Ключ конфигурации не найден');
        }
    }
}
