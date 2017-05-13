<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{	
	const THREE_FOR_TWO = 'three_for_two';
	const PERCENT_DISCOUNT_95 = '95_percent_discount';

    public function goodses()
    {
        return $this->belongsToMany(Goods::class);
    }
}
