<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\SubCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'category_id' => Category::all()->random()->id,
        'slug'=>Str::slug($faker->name)
    ];
});
