<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function create()
    {
        return view('category/create');
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories|max:255',
        ]);
        $data = new Category();
        $data->name = $request->name;
        $data->save();
        return redirect('category')->with('msg', 'Category added successfully');
    }

    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
    }


    function edit($id)
    {
        $data = Category::find($id);

        return view('category.edit', ['data' => $data]);
    }


    public function update(Request $request, $id)

    {

        $data = Category::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('category')->with('msg', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('category')->with('msg', 'Category deleted successfully');
    }
}
