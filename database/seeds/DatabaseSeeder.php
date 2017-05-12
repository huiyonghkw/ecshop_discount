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
        $this->call(GoodsAttributeSeeder::class);
        $this->call(GoodsCategorySeeder::class);
        $this->call(DiscountSeeder::class);
        //Create 50 goodses
        factory(App\Models\Goods::class, 50)->create()->each(function ($goods) {
            $discount = App\Models\Discount::find(rand(1, 2));
            $goods->discounts()->save($discount);
        });
        //Add discount for goodes
       $goodses = App\Models\Goods::get()->filter(function ($goods) {
           return $goods->id % 2;
       });

        $goodses->each(function ($goods) {
            $discount = App\Models\Discount::find(rand(1, 2));
            $goods->discounts()->save($discount);
        });
    }
}
