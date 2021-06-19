<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tip_id' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
        ]);


        if (!$data) {
            return redirect()->route('admin.categories.create')
                ->withErrors($request)
                ->withInput();
        }

        $category = new Category();
        $category->tip_id = $request->input('tip_id');
        $category->category_name = $request->input('category_name');
        $saved = $category->save();
        if ($saved){
            return redirect()->route('admin.categories.index')->with('success', 'The category is added successfully!');
        }
        return redirect()->route('admin.categories.create')->with('danger', 'The category is not added!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
       $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request)
        {
            $category->update($request->all());
            return redirect()->route('admin.categories.index')->with('success', 'The group is edited!');;
        }
        return redirect()->route('admin.categories.edit')->with('danger', 'The group is not edited!!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('danger', "$category->name is deleted successfully!");
    }

    public function search(Request $request){

        $s = $request->s;
        $categories = Category::where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }
}
