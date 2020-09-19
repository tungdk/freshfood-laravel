<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';
    protected $guarded = ['id'];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
