<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goodses';


    public function discounts()
    {
        return $this->belongsToMany(Discount::class)->withTimestamps();
    }

    /**
     * Get unit price
     * @return float
     */
    public function getUnitPriceAttribute()
    {
        return $this->price / 100;
    }

    /**
     * Get display discount
     * @return string
     */
    public function getDisplayDiscountAttribute()
    {
    	if (!$this->discounts()) {
    		return '<button type="button" class="btn btn-xs btn-danger">暂无优惠</button>';
    	}
    	return '<button type="button" class="btn btn-xs btn-success">' . $this->betterDiscount()->title . '</button>';
    }

    /**
     * 更加优惠的折扣
     * @return Discount
     */
    public function betterDiscount()
    {
    	return $this->discounts()->orderBy('priority', 'ASC')->first();
    }

    public function goodsAttribute()
    {
        return $this->hasOne(GoodsAttribute::class, 'id', 'goods_attribute_id');
    }
}
