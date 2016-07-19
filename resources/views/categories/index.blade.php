@extends('app')

@section('content')
    <div class="container">
        <h1>Categories</h1>
        <div class="col-md-1">
            <button onclick="location.href='{{ route('categories.create') }}'" class="btn btn-success">Create</button>
        </div>
        <br />
        <br />
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->description}}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['id' => $cat->id]) }}">Edit</a> |
                        <a href="{{ route('categories.destroy', ['id' => $cat->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
