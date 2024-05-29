<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;


class CategoryController extends Controller
{
    public function list()
    {
        $data['currentRecord'] = Category::getCategory();
        $data['header_title'] = "Category";
        return view('admin.category.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Category";
        return view('admin.category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:categories',
        ]);
        $category = new Category();
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keyword);
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/category/list')->with('success', "A Category added successfully!");
    }

    public function edit($id)
    {
        $data['header_title'] = "Edit Category";
        $data['currentRecord'] = Category::getSingle($id);
        return view('admin.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $category = Category::getSingle($id);
        $request->validate([
            'slug' => 'required|unique:categories',
        ]);
        $category->update([
            'name' => trim($request->name),
            'slug' => trim($request->slug),
            'status' => trim($request->status),
            'meta_title' => trim($request->slug),
            'meta_description' => trim($request->slug),
            'meta_keywords' => trim($request->slug),
            'updated_at' => now(),
        ]);
        return redirect('admin/category/list')->with('success', "A Category updated successfully!");
    }

    public function delete($id)
    {
        $category = Category::getSingle($id);
        
        $category->delete();
        return redirect('admin/category/list')->with('success', "A Category deleted successfully!");
    }
}
