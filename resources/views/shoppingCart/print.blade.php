@extends('layouts.web.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <h1>打印商品清单...</h1></div>
                <div class="panel-body">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>商品</th>
                                <th>单价</th>
                                <th>购买量</th>
                                <th>赠送数量</th>
                                <th>小计金额</th>
                                <th>节省金额</th>
                                <th>折扣信息</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shoppingCart->goodses as $goods)
                                <tr>
                                    <input type="hidden" name="goods_id[]" value="{{ $goods->id }}">
                                    <th scope="row">{{ $goods->id }}</th>
                                    <td>{{ $goods->name }}</td>
                                    <td>
                                        <i class="fa fa-fw fa-cny"></i>{{ $goods->unit_price }}
                                    </td>
                                    <td>
                                        {{ $goods->pivot->quantity }} {{ $goods->goodsAttribute->attribute }}
                                    </td>
                                    <td>
                                        {{ $goods->pivot->free_quantity }} {{ $goods->goodsAttribute->attribute }}
                                    </td>
                                    <td><i class="fa fa-fw fa-cny"></i>{{ $goods->pivot->total_amount / 100 }}</td>
                                    <td><i class="fa fa-fw fa-cny"></i>{{ $goods->pivot->save_amount / 100 }}</td>
                                    <td>
                                        {!! $goods->display_discount !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-body">
                    <h2 class="text-right">小计</h2>
                    <p class="text-right">商品共计：{{ $shoppingCart->total_goods }} 件</p>
                    <p class="text-right">总金额：<i class="fa fa-fw fa-cny"></i> {{ $shoppingCart->format_total_amount }} </p>
                    <p class="text-right">节省金额： <i class="fa fa-fw fa-cny"></i> {{ $shoppingCart->format_save_amount }} </p>
                </div>
            </div>

        </div>

    </div>
    </div>
@endsection
