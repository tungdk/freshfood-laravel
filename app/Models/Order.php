<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $arrStatus=[
        '1'=>[
            'class'=>'default',
            'name'=>'Tiếp nhận'
        ],
        '2'=>[
            'class'=>'info',
            'name'=>'Đang vận chuyển'
        ],
        '3'=>[
            'class'=>'success',
            'name'=>'Đã bàn giao'
        ],
        '-1'=>[
            'class'=>'danger',
            'name'=>'Đã hủy'
        ],
    ];
    public function getStatus()
    {
        return Arr::get($this->arrStatus,$this->status,"[N\A]");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

}
