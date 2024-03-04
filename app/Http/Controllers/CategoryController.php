<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('admin.category.index', [
            'categories' => Category::paginate()
        ]);
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('admin.category.create');
    }

    public function store(): \Illuminate\Http\RedirectResponse
    {

        Category::create($this->validateCategory());


        return redirect('/admin/category');
    }

    public function edit(Category $category): \Illuminate\Contracts\Foundation\Application
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Category $category): \Illuminate\Http\RedirectResponse
    {
        $attributes = $this->validateCategory($category);


        $category->update($attributes);

        return redirect('/admin/category')->with('success', 'Category Updated!');
    }

    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {

        $category->delete();

        return back()->with('success', 'Category Deleted!');
    }

    protected function validateCategory(?Category $category = null): array
    {
        $category ??= new Category();

        return request()->validate([
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('categories', 'slug')->ignore($category)
            ],
        ]);
    }
}
