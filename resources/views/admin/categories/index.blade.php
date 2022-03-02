@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status')}}
    </div>
@endif
                <table class="table table-striped table-info table-hover table-bordered border-dark">
                    <thead>
                        <tr class="table-default border-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th colspan="3" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }} </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.categories.show', $category) }}">View</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
           
        
        <div class="row">
            <div class="col">
                {{ $categories->links() }}
            </div>
        </div>
    
@endsection