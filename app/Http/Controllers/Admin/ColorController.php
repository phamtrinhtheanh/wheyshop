<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Str;
use Auth;

class ColorController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Color';
        $data['currentRecord'] = Color::getRecord();
        return view('admin.color.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Category";
        return view('admin.color.add', $data);
    }

    public function insert(Request $request)
    {
        $color = new Color();
        $color->title = $request->title;
        $color->code = $request->code;
        $color->created_by = Auth::user()->id;
        $color->save();
        return redirect('admin/color/list')->with('success', "A Color added successfully!");
    }

    public function edit($id)
    {
        $data['header_title'] = "Edit Color";
        $data['currentRecord'] = Color::getSingle($id);
        return view('admin.color.edit', $data);
    }

    public function update($id, Request $request)
    {
        $color = Color::getSingle($id);
        $color->title = trim($request->title);
        $color->updated_at = now();
        $color->save();
        return redirect('admin/color/list')->with('success', "A Color updated successfully!");
    }

    public function delete($id)
    {
        $category = Color::getSingle($id);
        $category->delete();
        return redirect('admin/color/list')->with('success', "A Color deleted successfully!");
    }
}
