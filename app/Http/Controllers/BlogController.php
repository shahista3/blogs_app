<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    //
    public function create()
    {
        $data = Category::all();
        return view('blog.create', compact('data'));
    }


    function store(Request $request)
    {
    //     $validated = $request->validate([
    //         'title' => 'required|string|unique:categories',
    //         'description' => 'required|string|max:400',
    //         'category_id' => 'required|integer',
    //         'categories.name' => $request->input('category_id') == -1 ? 'nullable|string' : 'required|string',
    //         'image' => 'required',
    //     ]);
        // Create a new Blog instance and save it
        $data1 = new Blog;
        $data1->title = $request->title;
        $data1->description = $request->description;
        $data1->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $data1->image = $name;
        }
        $data1->save();
        return redirect('blog')->with('message', 'Blog added successfully');
    }

    //for display
    function index()
    {
        $data1 = Blog::with('category')->get();
        // dd($data1);
        return view('blog.index', compact('data1'));
    }

    function edit($id)
    {
        $data1 = Blog::find($id);
        $categories = Category::all();
        return view('blog.edit', compact('data1', 'categories'));
    }


    public function update(Request $request, $id)

    {

        $data1 = Blog::find($id);
        $data1->title = $request->title;
        $data1->description = $request->description;
        $data1->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $data1->image = $name;
        }
        $data1->save();
        return redirect()->route('blog')->with('message', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $data1 = Blog::find($id);
        $data1->delete();
        return redirect()->route('blog')->with('message', 'Blog deleted successfully');
    }
}
