<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Resources\todoCollection;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index($id)
    {
        // return new TodoCollection(Todo::all());
        return new TodoCollection(Todo::where('idUser', $id)->get());
    }

    public function store(Request $request)
    {
        $todo = new Todo([
            'idUser' => $request->get('idUser'),
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'statut' => $request->get('statut'),
        ]);

        $todo->save();
        return response()->json('sucess');
    }

    public function delete($id)
    {
      $todo = Todo::find($id);

      $todo->delete();

      return response()->json('successfully deleted');
    }

    public function edit($id)
    {
      $todo = Todo::find($id);
      return response()->json($todo);
    }

    public function update($id, Request $request)
    {
      $todo = Todo::find($id);

      $todo->update($request->all());

      return response()->json('successfully updated');
    }
}