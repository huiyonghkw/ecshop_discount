<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Goods::class, function (Faker\Generator $faker) {
    $units = [
    	'越南草虾',
    	'优选黄柠檬',
    	'冷冻榴莲果肉',
    	'新疆库尔勒香梨',
    	'广西小青忙',
    	'手抓饼',
    	'花生油',
        '饼干',
        '澳洲精选S级牛腩块',
        '深海大虾',
        '糖果炫迈口香糖',
        '南方黑芝麻 黑芝麻糊',
        '进口凤梨',
        '纯真酸牛奶',
    	'鸡胸肉片',
        '美国进口饮料亚利桑那冰茶茶饮料'
    ];
    return [
        'name' => $faker->randomElement($units),
        'description' => $faker->realText(191, 5),
        'barcode' => $faker->isbn13,
        'price' => $faker->numberBetween(1, 9900),
        'goods_attribute_id' => rand(0, 7),
        'goods_category_id' => rand(0, 7),
    ];

});
