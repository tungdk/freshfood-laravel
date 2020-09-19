<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Publisher;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Publisher::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'email'=>$faker->safeEmail,
        'phone'=>$faker->phoneNumber,
        'address'=>$faker->address,
        'slug'=>Str::slug($faker->name)
    ];
});
