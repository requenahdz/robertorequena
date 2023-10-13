<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SqlBackup extends Command
{
    protected $signature = 'sql:backup';
    protected $description = 'Create a backup of the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = config('database.connections.mysql.database'); // Cambia a 'pgsql' si usas PostgreSQL
        $file = 'backup_' . date('Y-m-d_His') . '.sql';
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');


        try {
            $result = exec("cd storage/app/backups && mysqldump -u " . $username . " -p" . $password . " {$database} > {$file}", $output, $exitCode);
            // Ver la salida del comando
            echo "Salida del comando: $result";
            echo "<br>";
            // Ver la salida detallada como un array
            print_r($output);
            echo "<br>";    
            // Ver el código de salida (0 generalmente significa éxito)
            echo "Código de salida: $exitCode";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
