<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::paginate(5);
        return view('dashboard.categories.index' , compact('categories'));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required' , 'unique:categories,name'] ,
        ]);

        Category::create($request->all());
        session()->flash('Added','THE DATA ADDED SUCCESSFULLY');
        return redirect()->route('dashboard.categories.index');
    }

    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
           'name'=>['required' , Rule::unique('categories')->ignore($category->id)]
        ]);

        $category->update($request->all());
        session()->flash('Added','THE DATA UPDATED SUCCESSFULLY');
        return redirect()->route('dashboard.categories.index');

    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('Added','THE DATA DELETED SUCCESSFULLY');
        return redirect()->back();

    }
}
