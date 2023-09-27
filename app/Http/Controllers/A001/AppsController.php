<?php

namespace App\Http\Controllers\A001;

use Illuminate\Http\Request;
use App\Models\A001\App;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class AppsController extends Controller
{
    public function index(Request $request)
    {
        $entity = App::all();
        return Response::json($entity, 200);
    }

    public function show($id)
    {
        $entity = App::find($id);
        return Response::json($entity, 200);
    }

    public function store(Request $request)
    {
        $entity = new App();
        $entity = $entity->create($request->all);
        return Response::json($entity, 200);
    }

    public function update(Request $request, $id)
    {
        $entity = App::find($id);
        $entity = $entity->update($request->all);
        return Response::json($entity, 200);
    }

    public function delete(Request $request, $id)
    {
        $entity = App::find($id);
        $entity = $entity->update(['active' => 0]);
        return Response::json($entity, 200);
    }
}
