<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    //
    public function list()
    {
        $data['getAdmin'] = User::getAdmin();
        $data['header_title'] = "Admin";
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['getAdmin'] = User::getAdmin();
        $data['header_title'] = "Add";

        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|email',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', "An admin added successfully!");
    }

    public function edit($id)
    {
        $data['header_title'] = "Edit";
        $data['currentRecord'] = User::getSingle($id);
        return view('admin.admin.edit', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|email',
        ]);
        $user = User::getSingle($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        return redirect('admin/admin/list')->with('success', "An admin added successfully!");
    }
    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_deleted = 0;
        $user->save();
        return redirect('admin/admin/list')->with('warning', "An admin deleted successfully!");

    }
}
