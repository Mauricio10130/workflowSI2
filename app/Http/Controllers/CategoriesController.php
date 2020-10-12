<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('verified');
    }

    public function index()
    {
        $categories = Category::select('*')
            ->orderBy('id','asc')
            ->get();

        return view('categories.index',['categories' => $categories]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = request('name');
        $category->description = request('description');
        $category->save();

        return redirect('categorias');
    }

    public function show($id)
    {
        return view('categories.show', ['category' => Category::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('categories.modal-edit', ['category' => Category::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->update();

        return redirect('/categorias');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categorias');
    }
}
