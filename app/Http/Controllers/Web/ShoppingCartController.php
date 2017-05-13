<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\ShoppingCart\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use App\Models\Goods;
use DB;
use App\Models\Discount;
use App\Models\GoodsShoppingCart;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ShoppingCart::create([
            'total_goods' => 0,
            'total_amount' => 0,
            'save_amount' => 0,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $goodses = $request->get('goods_id');
        $quantities = $request->get('quantity');

        if (!$goodses || !$quantities) {
            abort(404);
        }

        DB::beginTransaction();
        $shoppingCart = $this->create();
        try {
            $shoppingCart = $this->create();
            collect($goodses)->each(function ($goodsId, $index) use ($quantities) {
                
                $goods = Goods::find($goodsId);
                //获取优惠信息
                $goods = $this->discount($goods->betterDiscount(), $goods, $quantities);
                $this->addShippingCartGoods($goods, $shoppingCart);
                DB::commit(); 
            });    
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('shopping_carts.show', $shoppingCart->id);
    }

    /**
     * 折扣运算器，时间关系，本次不作为单独的Service实现，后期可以通过折扣服务层完成折扣金额运算
     * @param  Discount $discount 
     * @param  Goods    $goods    
     * @param  integer  $quantities 
     * @return integer             
     */
    public function discount(
        Discount $discount,
        Goods $goods,
        $quantities
        )
    {
        switch ($discount) {
            //买二赠一
            case $discount->mark == Discount::THREE_FOR_TWO:
                    if ($goods->discount_id == $discount->id) {
                        return $this->buyTwoGetOneFree($goods, $quantities);
                    }
                break;
            case $discount->mark == Discount::PERCENT_DISCOUNT_95:
                    if ($goods->discount_id == $discount->id) {
                        return $this->percentDiscount95($goods, $quantities);
                    }
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * 买二赠一
     * @param  Goods $goods      
     * @param  integer $quantities 
     * @return void             
     */
    public function buyTwoGetOneFree($goods, $quantities)
    {  
        $goods->freeQuantities = $this->mulriple($quantities);
        $goods->quantity = $quantities - $goods->freeQuantities;
        $goods->save_amount = 0;
        return $goods;
    }

    /**
     * 计算赠送数量
     * @param  integer  $max    
     * @param  integer $number 
     * @return  integer         
     */
    public  function mulriple($max, $number = 2)
    {
        $i = 1;
        while ( true ) {
            if ( $number * $i > $max) {
                return ($i - 1);
            };        
            if ($number * $i == $max) {
                return $i;
            }
            $i ++;
        }
    }

     /**
     * 九五折
     * @param  Goods $goods
     * @param  integer $quantities 
     * @return void             
     */
    public function percentDiscount95($goods, $quantities)
    {
        $goods->save_amount = $goods->price * 0.95;
        $goods->quantity = $quantities;
        $goods->freeQuantities = 0;
        return $goods;
    }

    /**
     * Add shipping cart goods
     * @param Goods $goods        
     * @param ShippingCart $shoppingCart 
     */
    public function addShippingCartGoods($goods, $shoppingCart)
    {
        $cartGoods = GoodsShippingCart::create([
            'goods_id' => $goods->id,
            'shopping_cart_id' => $shoppingCart->id,
            'quantity' => $goods->quantity,
            'free_quantity' => $goods->freeQuantities,
            'discount_id' => $goods->discount_id,
            'discount_id' => $goods->betterDiscount()->id,
            'total_amount' => $goods->quantity * $goods->price,
            'save_amount' => $goods->save_amount() * $goods->quantity,
        ]);

        $shippingCart->update($shippingCart, [
            'total_goods' => $shippingCart->total_goods + 1,
            'total_amount' => $shippingCart->total_amount + $cartGoods->total_amount,
            'save_amount' => $shippingCart->save_amount + $cartGoods->save_amount,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
