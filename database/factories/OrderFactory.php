<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use App\Models\Discount;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //
        'customer_id' => Customer::all()->random()->id,
        'discount_id' => Discount::all()->random()->id,
        'total' => 50000
    ];
});
