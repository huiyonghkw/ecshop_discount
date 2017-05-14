<?php

use Illuminate\Database\Seeder;

class GoodsAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            '斤',
            '公斤',
            '瓶',
            '桶',
            '个',
            '量',
            '升',
            '傍'
        ];
        collect($units)->each(function ($item, $key) {
            $key += 1;
            App\Models\GoodsAttribute::create([
                'class' => $key,
                'attribute' => $item
                ]);
        });
    }
}
