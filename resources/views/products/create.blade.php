@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="/store" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">

                <div class="col-8">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" id="name" name="name" required class="form-control">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Description</label>
                        <textarea name="description" class="form-control" required rows="5"></textarea>
                    </div>

                    <div class="row">

                        <div class="form-check col-6">
                            <input class="form-check-input" type="checkbox" value="1" id="Clothing" name="category[]">
                            <label class="form-check-label" for="Clothing">
                                Clothing
                            </label>

                        </div>

                        <div class="form-check col-6">
                            <input class="form-check-input" type="checkbox" value="2" id="Garden" name="category[]">
                            <label class="form-check-label" for="Garden">
                                Garden
                            </label>

                        </div>

                        <div class="form-check col-6">
                            <input class="form-check-input" type="checkbox" value="3" id="Kitchen" name="category[]">
                            <label class="form-check-label" for="Kitchen">
                                Kitchen
                            </label>

                        </div>

                        <div class="form-check col-6">
                            <input class="form-check-input" type="checkbox" value="4" id="Bedroom" name="category[]">
                            <label class="form-check-label" for="Bedroom">
                                Bedroom
                            </label>

                        </div>
                    </div>
                    <div class="my-3">
                        <input class="form-control form-control-sm" type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>
@endsection
