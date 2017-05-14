@extends('layouts.web.app')
@section('content')
    <form action="{{ route('goodses.store') }}" method="post">
        {{ csrf_field() }}
        <search-goods></search-goods>
    </form>
@endsection
