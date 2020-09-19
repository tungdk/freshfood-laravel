<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Discount;
use App\Models\District;
use App\Models\SubCategory;
use App\Models\UserFavourite;
use App\Models\Ward;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//      $data['namecity'] = City::all();
//      $data['nameDistrict'] = Discount::all();
//        $data['nameWard'] = Ward::all();
//        view()->share($data);

        $categories=Category::all();
        view()->share('categories', $categories);

        $favourite=UserFavourite::select('id')->count();
        view()->share('favourite', $favourite);
    }
}
