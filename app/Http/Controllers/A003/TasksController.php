<?php

namespace App\Http\Controllers\A003;

use Illuminate\Http\Request;
use App\Models\A003\Task;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $entity = Task::all();
        return Response::json($entity, 200);
    }

    public function show($id)
    {
        $entity = Task::with('comment')->find($id);
        return Response::json($entity, 200);
    }

    public function store(Request $request)
    {
        $entity = new Task();
        $entity = $entity->create($request->all());
        return Response::json($entity, 200);
    }

    public function update(Request $request, $id)
    {
        $entity = Task::find($id);
        $entity = $entity->update($request->all());
        return Response::json($entity, 200);
    }

    public function delete(Request $request, $id)
    {
        $entity = Task::find($id);
        $entity = $entity->update(['active' => 0]);
        return Response::json($entity, 200);
    }
}
