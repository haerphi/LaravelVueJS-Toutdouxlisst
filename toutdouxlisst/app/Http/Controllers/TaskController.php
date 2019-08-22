<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Resources\Collection;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($id)
    {
        // return new Collection(Task::all());
        return new Collection(Task::where('idTask', $id)->get());
    }

    public function store(Request $request)
    {
        $task = new Task([
            'idTodo' => $request->get('idStore'),
            'title' => $request->get('title'),
            'status' => $request->get('status')
        ]);

        $task->save();
        return response()->json('sucess');
    }

    public function delete($id)
    {
      $task = Task::find($id);

      $task->delete();

      return response()->json('successfully deleted');
    }

    public function update($id, Request $request)
    {
      $task = Task::find($id);

      $task->update($request->all());

      return response()->json('successfully updated');
    }
}