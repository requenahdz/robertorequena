<?php

namespace App\Http\Controllers\A001;

use Illuminate\Http\Request;
use App\Models\A001\Sitie;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class SqlController extends Controller
{
    public function backup()
    {
        return Artisan::call('sql:backup');
    }

    public function run()
    {
        return Artisan::call('sql:run');
    }
}
