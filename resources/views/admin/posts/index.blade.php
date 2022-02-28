@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status')}}
    </div>
@endif
    <div class="container">
        <div class="row">
            <h1 class="pt-3">Admin Post</h1>
            <div class="col">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-danger mb-5">Aggiungi Post</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-primary table-hover table-bordered border-dark">
                    <thead>
                        <tr class="table-danger border-dark">
                            <th scope="col">Title</th>
                            <th scope="col">Authors</th>
                            <th scope="col">Slug</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->slug }} </td>
                            <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">View</a></td>
                             <td><a class="btn btn-primary" href="{{ route('admin.posts.edit', $post) }}">Edit</a></td>
                            <td><form action="{{ route('admin.posts.destroy', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                            </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection