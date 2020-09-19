<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    // protected $fillable  = ['name'];
    protected $guarded = ['id'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class,'category_id','id');
    }
}
