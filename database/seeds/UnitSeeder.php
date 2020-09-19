<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $units = [
            [
            'name' => 'kg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],
            [

                'name' => 'hộp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
               
                'name' => 'thùng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        foreach ($units as $unit) {
            DB::table('units')->insert($unit);
        }
    }
}
