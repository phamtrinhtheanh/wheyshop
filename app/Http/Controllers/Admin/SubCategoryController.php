<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Auth;

class SubCategoryController extends Controller
{
    //
    public function list()
    {
        $data['header_title'] = 'SubCategory';
        $data['currentRecord'] = SubCategory::getRecord();
        return view('admin.subcategory.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Category";
        $data['category'] = Category::getCategory();
        return view('admin.subcategory.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:categories',
        ]);
        $category = new SubCategory();
        $category->name = trim($request->name);
        $category->category_id = trim($request->category_id);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keyword);
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/subcategory/list')->with('success', "A SubCategory added successfully!");
    }

    public function edit($id)
    {
        $data['header_title'] = "Edit SubCategory";
        $data['currentRecord'] = SubCategory::getSingle($id);
        $data['category'] = Category::getCategory();
        return view('admin.subcategory.edit', $data);
    }

    public function update($id, Request $request)
    {
        $category = SubCategory::getSingle($id);
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
        return redirect('admin/subcategory/list')->with('success', "A SubCategory updated successfully!");
    }

    public function delete($id)
    {
        $category = SubCategory::getSingle($id);
        $category->delete();
        return redirect('admin/subcategory/list')->with('success', "A SubCategory deleted successfully!");
    }
}
