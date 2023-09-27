<?php

namespace App\Http\Controllers\A001;

use Illuminate\Http\Request;
use App\Models\A001\Sitie;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class SitesController extends Controller
{
    public function index(Request $request)
    {
        $entity = Sitie::all();
        return Response::json($entity, 200);
    }

    public function show($id)
    {
        $entity = Sitie::find($id);
        return Response::json($entity, 200);
    }

    public function store(Request $request)
    {
        $entity = new Sitie();
        $entity = $entity->create($request->all);
        return Response::json($entity, 200);
    }

    public function update(Request $request, $id)
    {
        $entity = Sitie::find($id);
        $entity = $entity->update($request->all);
        return Response::json($entity, 200);
    }

    public function delete(Request $request, $id)
    {
        $entity = Sitie::find($id);
        $entity = $entity->update(['active' => 0]);
        return Response::json($entity, 200);
    }
}
