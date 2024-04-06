<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\FileStorage;
use Carbon\Carbon;

class DeleteOldFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for deleting old files';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $paths = FileStorage::all();
        $timeNow = Carbon::now();
        $expiredPaths = [];
        foreach ($paths as $path) {
            $time = Storage::lastModified($path->filePath);
            $modifiedTime = Carbon::parse($time)->addDays(30);
            if ($modifiedTime > $timeNow) {
                $expiredPaths[] = $path->filePath;
            }
        }
        Storage::delete($expiredPaths);
        FileStorage::whereIn('filePath', $expiredPaths)->delete();
    }
}
