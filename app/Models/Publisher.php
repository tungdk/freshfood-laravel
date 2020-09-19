<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'publishers';
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
