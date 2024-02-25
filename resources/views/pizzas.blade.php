@extends('layouts.main')

@section('content')
<div>
    @foreach ($pizzas as $pizza)
        <div>
            {{ $pizza->name }}
        </div>
    @endforeach
</div>
@endsection