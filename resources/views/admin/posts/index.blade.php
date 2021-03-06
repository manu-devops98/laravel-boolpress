@extends('layouts.admin')

@section('content')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status')}}
            </div>
        @endif
        <h1>Post:</h1>
                        <table class="table table-striped table-info table-hover table-bordered border-dark">
                            <thead>
                                <tr class="table-default border-dark">
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Slug</th>
                                    <th colspan="3" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>
                                        @foreach ($post->tags()->get() as $tag)
                                            {{ $tag->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $post->slug }} </td>
                                    <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">View</a></td>
                                    <td>
                                        @if (Auth::user()->id === $post->user_id)
                                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                        @else
                                            <a class="btn btn-primary disabled" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->id === $post->user_id)
                                            <form action="{{ route('admin.posts.destroy', $post)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger" type="submit" value="Delete">
                                        </form>
                                        @else
                                            <form action="{{ route('admin.posts.destroy', $post)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger disabled" type="submit" value="Delete">
                                        @endif
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                
                        <div class="row">
                            <div class="col">
                                {{ $posts->links() }}
                            </div>
                        </div>
@endsection