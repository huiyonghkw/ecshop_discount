<?php

use Illuminate\Database\Seeder;

class GoodsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            '水果',
            '生鲜',
            '肉类',
            '饮料',
            '坚果',
            '鲜奶',
            '零食',
            '蔬菜'
        ];
        collect($units)->each(function ($item) {
            App\Models\GoodsCategory::create([
                'name' => $item,
                'parent_id' => 0
                ]);
        });
    }
}
