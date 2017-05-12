<?php

use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                'title' => '买二增一',
                'description' => '每当买进两个商品，就可以免费再买一个相同商品',
                'priority' => 1,
                'start_at' => '2017-05-12 23:59:59',
                'end_at' => '2017-05-30 23:59:59',
            ],
            [
                'title' => '95折',
                'description' => '按单价的95%计算每个商品',
                'priority' => 2,
                'start_at' => '2017-05-12 23:59:59',
                'end_at' => '2017-06-30 23:59:59',
            ],
        ];
        collect($units)->each(function ($item, $key) {
            $key += 1;
            App\Models\Discount::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'priority' => $item['priority'],
                'start_at' => $item['start_at'],
                'end_at' => $item['end_at'],
                ]);
        });
    }
}
