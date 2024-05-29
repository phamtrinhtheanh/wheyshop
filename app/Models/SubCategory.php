<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sub_categories';
    protected $fillable = ['category_id', 'name', 'slug', 'status', 'meta_title', 'meta_description', 'meta_keywords', 'created_by'];

    static function getRecord()
    {
        return self::select('sub_categories.*', 'users.name as created_by_name', 'categories.name as category_name')
        ->join('users', 'users.id', '=', 'sub_categories.created_by')
        ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
        ->paginate(5);
    }

    static function getSingle($id)
    {
        return self::find($id);
    }
}