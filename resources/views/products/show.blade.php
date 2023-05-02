@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="{{ $product->image }}" />
            </div>
            <div class="col-8 text-start">
                <h3> {{ $product->name }} </h3>
                <p> {{ $product->description }} </p>

                @foreach ($product->categories as $category)
                    <h5> {{ $category->name }} </h5>
                @endforeach

            </div>
        </div>
    </div>
@endsection
