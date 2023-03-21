<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Todo;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.show', compact('categories'));
    }
    public function create()
    {
        if (request()->isMethod('post')) {
            $category = new Categorie();
            $category->name = request()->name;
            $category->save();
            return redirect()->to('/categories')->send();
        }
        return view('categories.create');
    }

    public function edit($id)
    {
        if (request()->isMethod('post')) {
            $category = Categorie::find($id);
            $todo = Todo::where('categorias', $category->name)->get();
            print_r($todo->toArray());
            foreach ($todo as $t) {
                $t->categorias = null;
                $t->save();
            }
            $category->name = request()->name;
            $category->save();
            $todo = Todo::where('categorias', null)->get();
            $todo->categorias = $category->name;
            foreach ($todo as $t) {
                $t->categorias = $category->name;
                $t->save();
            }
            return redirect()->to('/categories')->send();
        }
        $category = Categorie::find($id);
        return view('categories.edit', compact('category'));
    }
    public function destroy($id)
    {
        $category = Categorie::find($id);
        $todo = Todo::where('categorias', $category->name)->get();
        foreach ($todo as $t) {
            $t->categorias = 'Sin Categoría';
            $t->save();
        }
        $category->delete();
        return redirect()->to('/categories')->send();
    }

}