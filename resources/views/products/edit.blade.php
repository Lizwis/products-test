@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form method="post" action="/update/{{ $product->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ $product->image }}" width="100%" />
                            <div class="mt-3">
                                <input class="form-control form-control-sm" type="file" name="image">
                            </div>
                        </div>

                        <div class="col-9">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" id="name" name="name" required class="form-control"
                                    value="{{ $product->name }}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Description</label>
                                <textarea name="description" class="form-control" required rows="5">{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">

                                <div class="form-check col-6">
                                    <input class="form-check-input" type="checkbox" value="1" id="Clothing"
                                        name="category[]" @if (in_array(1, $products_category)) checked @endif>
                                    <label class="form-check-label" for="Clothing">
                                        Clothing
                                    </label>

                                </div>

                                <div class="form-check col-6">
                                    <input class="form-check-input" type="checkbox" value="2" id="Garden"
                                        name="category[]" @if (in_array(2, $products_category)) checked @endif>
                                    <label class="form-check-label" for="Garden">
                                        Garden
                                    </label>

                                </div>

                                <div class="form-check col-6">
                                    <input class="form-check-input" type="checkbox" value="3" id="Kitchen"
                                        name="category[]" @if (in_array(3, $products_category)) checked @endif>
                                    <label class="form-check-label" for="Kitchen">
                                        Kitchen
                                    </label>

                                </div>

                                <div class="form-check col-6">
                                    <input class="form-check-input" type="checkbox" value="4" id="Bedroom"
                                        name="category[]" @if (in_array(4, $products_category)) checked @endif>
                                    <label class="form-check-label" for="Bedroom">
                                        Bedroom
                                    </label>

                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
