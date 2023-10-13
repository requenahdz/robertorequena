<?php

namespace App\Http\Controllers\A001;

use Illuminate\Http\Request;
use App\Models\A001\Sitie;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SqlController extends Controller
{
    public function backup()
    {
        $response = Artisan::call('sql:backup');
        return Response::json($response, 200);
    }

    public function run()
    {
        $response  = Artisan::call('sql:run');
        return Response::json($response, 200);
    }

    public function tabla($table = null)
    {

        if ($table) {
            $response =  DB::table($table)->get();
        } else {
            $response =  collect(DB::select('SHOW TABLES'))->pluck('Tables_in_' . env('DB_DATABASE'));
        }
        return Response::json($response, 200);
    }
}
