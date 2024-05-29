<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status', 'meta_title', 'meta_description', 'meta_keywords', 'created_by'];
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        // Listen for the "deleting" event on the Category model
        static::deleting(function ($category) {
            // Soft delete all related SubCategory records
            $category->subCategories()->delete();
        });
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    static function getCategory()
    {
        return self::select('categories.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=', 'categories.created_by')
        ->orderBy('categories.id')
        ->get();
    }

    static function getSingle($id)
    {
        return self::find($id);
    }
}
