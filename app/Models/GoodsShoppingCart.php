<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsShoppingCart extends Model
{
	protected $table = 'goods_shopping_cart';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'goods_id', 'shopping_cart_id', 'quantity',
        'free_quantity', 'discount_id', 'total_amount', 'save_amount'
    ];
}
