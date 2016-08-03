@extends('app')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <div class="col-md-1">
            <button onclick="location.href='{{ route('products.create') }}'" class="btn btn-default">New</button>
        </div>
        <br />
        <br />
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Feature</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $prod)
                <tr>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->name}}</td>
                    <td>{{$prod->description}}</td>
                    <td>{{$prod->price}}</td>
                    <td>{{$prod->featured}}</td>
                    <td>{{$prod->recommend}}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id' => $prod->id]) }}">Edit</a> |
                        <a href="{{ route('products.destroy', ['id' => $prod->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
