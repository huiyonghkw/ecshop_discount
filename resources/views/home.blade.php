@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>亲爱的会员，</h1> <h4>欢迎光临沃尔顿乡村联合超市，<a href="{{ route('goodses.index') }}">点击这里</a>购买商品</h4></div>

                <div class="panel-body">

                    {{-- <passport-clients></passport-clients> --}}
                    <passport-authorized-clients></passport-authorized-clients>
                    <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
