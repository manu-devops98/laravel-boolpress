@extends('layouts.app')

@section('content')
    <div class="container">
            <h1 class="my-3">Post: "{{ $post->title }}"</h1>
            <div class="row">
                <div class="col-6">
                    <ul>
                        @foreach ($post->toArray() as $key => $item)
                        <li>
                            <h2 class="fs-3 text-danger">{{$key}}: <span class="fw-normal text-dark">{{$item}}</span></h2>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a class="btn btn-danger my-3" href="{{ route('admin.posts.index')}}">Home</a>
            <a href="{{ url()->previous()}}" type="submit" class="btn btn-primary">Previous</a>
        </div>
@endsection