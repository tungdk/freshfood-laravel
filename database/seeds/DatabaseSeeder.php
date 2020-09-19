<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            PublisherSeeder::class,
            DiscountSeeder::class,
            CategorySeeder::class,
            CustomerSeeder::class,
            UnitSeeder::class,
            MenuSeeder::class,
            ArticleSeeder::class,
            SubCategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
