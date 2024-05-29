<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    static function getRecord()
    {
        return self::select('brands.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=', 'brands.created_by')
        ->paginate(5);
    }

    static function getSingle($id)
    {
        return self::find($id);
    }
    
}
