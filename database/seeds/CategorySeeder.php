<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [[
            'name' => 'Mẹ Và Bé',
            'hot' => 0,
            'slug' =>  'me-va-be',
            'icon' => 'fa fa-heart-o',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Đồ Khô',
            'hot' => 0,
            'slug' =>  'thit-sach',
            'icon' => 'fa fa-cutlery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Rau Củ Quả',
            'hot' => 0,
            'slug' =>  'thuy-hai-san',
            'icon' => 'fa fa-shopping-basket',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Trái Cây Hữu Cơ',
            'hot' => 0,
            'slug' =>  'hoa-qua-sach',
            'icon' => 'fa fa-heart-o',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Chăm Sóc Cơ Thể',
            'hot' => 0,
            'slug' =>  'Dac-san-3-mien',
            'icon' => 'fa fa-cutlery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Mỹ Phẩm Hữu cơ',
            'hot' => 0,
            'slug' =>  'an-toan-thuc-pham',
            'icon' => 'fa fa-shopping-basket',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Chăm Sóc Nhà Cửa',
            'hot' => 0,
            'slug' =>  'qua-tet',
            'icon' => 'fa fa-heart-o',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Đồ Uống Hữu Cơ',
            'hot' => 0,
            'slug' =>  'an-ngon',
            'icon' => 'fa fa-cutlery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Gia Vị Và Phụ Liệu',
            'hot' => 0,
            'slug' =>  'goi-thuc-pham-theo-thang',
            'icon' => 'fa fa-shopping-basket',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Sách Về Sức Khỏe',
            'hot' => 0,
            'slug' =>  'tien-ich',
            'icon' => 'fa fa-heart-o',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]];
        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
