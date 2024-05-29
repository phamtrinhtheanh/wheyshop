<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Color extends Model
{
    use HasFactory, SoftDeletes;
    static function getRecord()
    {
        return self::select('colors.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=', 'colors.created_by')
        ->paginate(5);
    }

    static function getSingle($id)
    {
        return self::find($id);
    }
}
