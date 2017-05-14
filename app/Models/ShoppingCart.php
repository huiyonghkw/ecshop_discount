<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_goods', 'total_amount', 'save_amount'
    ];

    public function goodses()
    {
        return $this->belongsToMany(Goods::class)->withPivot('quantity', 'free_quantity', 'total_amount', 'save_amount');
    }

    public function getFormatTotalAmountAttribute()
    {
        return $this->total_amount / 100;
    }

    public function getFormatSaveAmountAttribute()
    {
        return $this->save_amount / 100;
    }
}
