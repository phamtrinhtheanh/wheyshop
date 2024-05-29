<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Brand;
use Str;
class BrandController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Brand';
        $data['currentRecord'] = Brand::getRecord();
        return view('admin.brand.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Category";
        return view('admin.brand.add', $data);
    }

    public function insert(Request $request)
    {
        $brand = new Brand();
        $brand->title = $request->title;
        $title = trim($request->title);
        $slug = Str::slug($title, '-');
        $brand->slug = $slug;
        $brand->created_by = Auth::user()->id;
        $brand->save();
        return redirect('admin/brand/list')->with('success', "A Brand added successfully!");
    }

    public function edit($id)
    {
        $data['header_title'] = "Edit Brand";
        $data['currentRecord'] = Brand::getSingle($id);
        return view('admin.brand.edit', $data);
    }

    public function update($id, Request $request)
    {
        $brand = Brand::getSingle($id);
        $brand->title = trim($request->title);
        $brand->updated_at = now();
        $brand->save();
        return redirect('admin/brand/list')->with('success', "A Brand updated successfully!");
    }

    public function delete($id)
    {
        $category = Brand::getSingle($id);
        $category->delete();
        return redirect('admin/brand/list')->with('success', "A Brand deleted successfully!");
    }
}
