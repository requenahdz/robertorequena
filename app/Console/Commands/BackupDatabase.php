<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackupDatabase extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Create a backup of the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $databaseName = config('database.connections.mysql.database'); // Cambia a 'pgsql' si usas PostgreSQL
        $backupFileName = 'backup_' . date('Y-m-d_His') . '.sql';

        // Utiliza mysqldump o pg_dump para crear el respaldo
        exec("cd storage/app/backups && mysqldump -u ".config('database.connections.mysql.username')." -p".config('database.connections.mysql.password')." {$databaseName} > {$backupFileName}");
        // Cambia a "pg_dump" si estás utilizando PostgreSQL

        $this->info("Backup created: {$backupFileName}");
    }
}
