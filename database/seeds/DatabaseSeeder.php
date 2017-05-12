<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 50)->create();
        // factory(App\Models\GoodsAttribute::class, 7)->create();
        $this->call(GoodsAttributeSeeder::class);
        $this->call(GoodsCategorySeeder::class);
        factory(App\Models\Goods::class, 50)->create();
    }
}
