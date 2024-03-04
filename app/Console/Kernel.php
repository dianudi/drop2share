<?php

namespace App\Console;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $files = File::select('id', 'storage_path')->whereDate('delete_at', '>=',  Carbon::now())->get();
            if (!$files) return;
            foreach ($files as $file) {
                if (Storage::exists($file->storage_path)) Storage::delete($file->storage_path);
                $file->delete();
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
