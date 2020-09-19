<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admins = [[
            'name' => 'Tuoithotranve98',
            'email' => 'nxtho0109@gmail.com',
            'phone' => '098237623',
            'password' =>  Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'NguyenXuanTho',
            'email' => 'tho222961@gmail.com',
            'phone' => '0357004230',
            'password' =>  Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]];
        foreach ($admins as $admin) {
            DB::table('admins')->insert($admin);
        }
    }
}
