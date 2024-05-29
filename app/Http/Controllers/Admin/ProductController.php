<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Str;
class ProductController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Product';
        $data['currentRecord'] = Product::getRecord();
        return view('admin.product.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add Product";
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {
        $title = trim($request->title);
        $slug = Str::slug($title, '-');
        $product = new Product();
        $product->title = $title;
        $product->save();
        $check = Product::checkSlug($slug);
        if(!empty($check)) 
        {
            $product->slug = $slug;
        }
        else 
        {
            $newSlug = $slug . '-' . $product->id;
            $product->slug = $newSlug;
        }
        $product->save();
        return redirect('admin/product/list')->with('success', "A Product added successfully!");
        
    }
    public function edit($id)
    {
        $data['header_title'] = "Edit Product";
        $data['currentRecord'] = Product::getSingle($id);
        return view('admin.product.edit', $data);
    }

    public function update($id, Request $request)
    {
        $product = Product::getSingle($id);
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->old_price = $request->old_price;
        $product->price = $request->price;
        $product->short_description = $request->short_description;
        $product->save();
        return redirect('admin/product/list')->with('success', "A product updated successfully!");
    }
    public function delete($id)
    {
        $product = Product::getSingle($id);
        $product->delete();
        return redirect('admin/product/list')->with('success', "A product deleted successfully!");
    }
}
