<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $guarded = [''];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function favourite()
    {
        return $this->belongsToMany(User::class,'user_favourites','product_id','user_id');
    }
}
