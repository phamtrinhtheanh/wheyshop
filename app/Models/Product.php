<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    static function getRecord()
    {
        return self::select('products.*')
        ->paginate(5);
    }

    static function getSingle($id)
    {
        return self::find($id);
    }
    
    static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }
    
}
