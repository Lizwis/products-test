@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-0 px-0">
                <div class="col-12 text-start">
                    <a href="/create" class="btn btn-primary">Add New</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Last Update</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    @foreach ($products as $product)
                        <tbody>
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @foreach ($product->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </td>
                                <td>{{ $product->updated_at }}</td>
                                <td><a href="/show/{{ $product->id }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="/edit/{{ $product->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
