<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RunSqlFile extends Command
{
    protected $signature = 'sql:run';
    protected $description = 'Run an SQL file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $folderPath = storage_path('app/backups');
        $files = File::files($folderPath);

        if (empty($files)) {
            $this->error("File not found");
            return false;
        } 
        $file = $files[0];

        if (!file_exists($file)) {
            $this->error("File not found: {$file}");
            return;
        }

        try {
            DB::unprepared(file_get_contents($file));
            $this->info("SQL file executed successfully: {$file}");
        } catch (\Exception $e) {
            $this->error("Error executing SQL file: {$e->getMessage()}");
        }
    }
}
