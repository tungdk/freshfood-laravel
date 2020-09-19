<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $table = 'images';
   
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
