@extends('layouts.web.app')
@section('content')
    <div class="container">
    <div class="row">
    <form action="{{ route('shopping_carts.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <h1>我的购物车...</h1></div>
                <div class="panel-body">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>商品</th>
                                <th>单价</th>
                                <th>折扣信息</th>
                                <th>购买量</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goodses as $goods)
                                <tr>
                                    <input type="hidden" name="goods_id[]" value="{{ $goods->id }}">
                                    <th scope="row">{{ $goods->id }}</th>
                                    <td>{{ $goods->name }}</td>
                                    <td>
                                        <i class="fa fa-fw fa-cny"></i>{{ $goods->unit_price }}
                                    </td>
                                    <td>
                                        {!! $goods->display_discount !!}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="form-group {{ $errors->has('quantity') ? 'has-error': '' }}">
                                                     <input type="text" class="form-control" name="quantity[]">
                                                    @if ($errors->has('quantity'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('quantity') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary"> 立 即 结 算 </button>
                    </div>
                    
                </div>
            </div>

        </div>
    </form>
    </div>
    </div>
@endsection
