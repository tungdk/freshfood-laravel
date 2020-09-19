<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Discount;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Discount::class, function (Faker $faker) {
    return [
        //
        'code'=>Str::random(10),
        'money'=>$faker->numberBetween(10000,50000),
        
    ];
});
