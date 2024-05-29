<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        $products = Test::select('name', 'attributes')->get();
        return view('test/index', compact('products'));
    }
}
