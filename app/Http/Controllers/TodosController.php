<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use Facade\FlareClient\View;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.show', compact('todos'));
    }
    public function edit($id)
    {
        if (request()->isMethod('post')) {
            $todo = Todo::find($id);
            $todo->title = request()->title;
            $todo->description = request()->description;
            $todo->status = request()->status;
            $todo->save();
            return redirect()->to('/todos')->send();
        }
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function create()
    {
        if (request()->isMethod('post')) {
            $todo = new Todo();
            $todo->title = request()->title;
            $todo->description = request()->description;
            $todo->status = '0';
            $todo->user_email = request()->user_email;
            $todo->save();
            return redirect()->to('/todos')->send();
        }
        $users = User::all();
        return view('todos.create', compact('users'));
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return $this->index();
    }
}
