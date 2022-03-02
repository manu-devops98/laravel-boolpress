<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $validator = [
        'name' => 'required',
    ];

    public function index()
    {
        $categories = Category::paginate(15);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }
    public function update(Request $request, Category $category)
    {
        $request->validate($this->validator);
        $data = $request->all();

        if ($data['name'] != $category->name) {
            $category->name = $data['name'];
            $category->slug = $category->createSlug($data['name']);
        }
        $category->update();
        return redirect()->route('admin.categories.show', $category);
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $request->validate($this->validator);
        $data = $request->all();
        $category = new Category();
        $category->fill($data);
        $category->slug = $category->createSlug($data['name']);
        $category->save();
        return redirect()->route('admin.categories.show', $category);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()
            ->route('admin.categories.index')
            ->with('status', "Hai eliminato la categoria '$category->name'");
    }
}
