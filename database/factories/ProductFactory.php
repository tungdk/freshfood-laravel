<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Unit;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->name,
        'publisher_id' => Publisher::all()->random()->id,
        'unit_id' => Unit::all()->random()->id,
        'subcategory_id' => SubCategory::all()->random()->id,
        'price'=>$faker->numberBetween(50000,5000000),
        'price_entry'=>$faker->numberBetween(50000,5000000),
        'qty'=>$faker->biasedNumberBetween(),
        'number'=>1,
        'info'=>$faker->text($maxNbChars = 2000),
        'sale'=>$faker->numberBetween(0,20),
        'slug'=>Str::slug($faker->name)
        ];
});
