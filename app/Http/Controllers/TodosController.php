<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use App\Models\Categorie;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    public function index()
    {
        $selected = '';
        if (Auth::user()->profile === 'admin') {
            $todos = Todo::all();
        } else {
            $todos = Todo::where('user_email', Auth::user()->email)->get();
        }
        if (request()->isMethod('post')) {
            $categoria = request()->categorias;
            if ($categoria !== 'all') {
                $todos = Todo::where('categorias', $categoria)->get();
            }
            $selected = $categoria;
        }
        $categorias = Categorie::all();
        return view('todos.show', compact('todos', 'categorias', 'selected'));
    }
    public function edit($id)
    {
        
        if (request()->isMethod('post')) {
            $todo = Todo::find($id);
            $todo->title = request()->title;
            $todo->description = request()->description;
            $todo->status = request()->status;
            $todo->categorias = request()->categorias;
            $todo->save();
            return redirect()->to('/todos')->send();
        }
        $todo = Todo::find($id);
        $categorias = Categorie::all();
        return view('todos.edit', compact('todo', 'categorias'));
    }

    // check
    public function check($id)
    {
        $todo = Todo::find($id);
        $todo->status = '1';
        $todo->save();
        return $this->index();
    }

    public function create()
    {
        if (request()->isMethod('post')) {
            $todo = new Todo();
            $todo->title = request()->title;
            $todo->description = request()->description;
            $todo->status = '0';
            $todo->user_email = request()->user_email;
            $todo->categorias = request()->categorias;
            $todo->save();
            return redirect()->to('/todos')->send();
        }
        $users = User::all();
        $categorias = Categorie::all();
        return view('todos.create', compact('users', 'categorias'));
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return $this->index();
    }
}
