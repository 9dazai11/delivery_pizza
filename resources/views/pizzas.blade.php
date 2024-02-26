@extends('layouts.main')

@section('content')
<div class="container">
    @foreach ($pizzas as $pizza)
    <div class="row">
        <div class="col-sm-2">
            <img src="{{$pizza->image}}" class="img-thumbnail" style="width:200px; height:200px;" alt="pizza">
        </div>
        <div class="col-sm-10">
            <div>{{ $pizza->name }}</div>
            <div>{{ $pizza->description }}</div>
            <div>{{ $pizza->price }}</div>
        </div>
    </div>
    @endforeach
</div>
@endsection