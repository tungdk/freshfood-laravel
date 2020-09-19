<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menus = [[
            'name' => 'Ẩm thực',
            'hot' => 0,
            'slug' =>  'am-thuc',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Chứng nhận Hữu cơ',
            'hot' => 0,
            'slug' =>  'chung-nhan-huu-co',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Chuyện cây trồng/làm vườn',
            'hot' => 0,
            'slug' =>  'chuyen-cay-trong-lam-vuon',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Góc nội trợ',
            'hot' => 0,
            'slug' =>  'goc-noi-tro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Làm đẹp',
            'hot' => 0,
            'slug' =>  'lam-dep',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Món ăn ngon',
            'hot' => 0,
            'slug' =>  'mon-an-ngon',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Sản xuât hữu cơ',
            'hot' => 0,
            'slug' =>  'san-xuat-huu-co',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Thông tin hữu ích',
            'hot' => 0,
            'slug' =>  'thong-tin-huu-ich',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Thức uống',
            'hot' => 0,
            'slug' =>  'thuc-uong',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Chuyên mục sức khỏe',
            'hot' => 0,
            'slug' =>  'chuyen-muc-suc-khoe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]];
        foreach ($menus as $menu) {
            DB::table('menus')->insert($menu);
        }
    }
}
