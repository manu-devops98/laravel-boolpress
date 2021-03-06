@extends('layouts.admin')

@section('content')
            <h1>Post: "{{ $post->title }}"</h1>
            <div class="row">
                <div class="col">
                    <ul>
                        <li>
                            <h2 class="fs-3 text-danger">Author: <span class="fw-normal text-dark">{{ $post->user()->first()->name}}</span></h2>
                        </li>
                        <li>
                            <h2 class="fs-3 text-danger">Category: <span class="fw-normal text-dark">{{ $post->category()->first()->name}}</span></h2>
                        </li>
                        <li>
                            <h2 class="fs-3 text-danger">Tags: 
                                <span class="fw-normal text-dark">
                                @foreach ($post->tags()->get() as $tag)
                                    {{ $tag->name}}
                                @endforeach
                                </span>
                            </h2>
                        </li>
                        @foreach ($post->toArray() as $key => $item)
                        <li>
                            <h2 class="fs-3 text-danger">{{$key}}: <span class="fw-normal text-dark">{{$item}}</span></h2>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @if (!empty($post->image))
                <div class="col-4">
                    <div class="container">
                        <h2 class="fs-3 text-danger">Image:</h2>
                        <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title}}">
                    </div>
                </div>
                @endif
            </div>
            {{-- <a class="btn btn-danger my-3" href="{{ route('admin.posts.index')}}">Home</a>
            <a href="{{ url()->previous()}}" type="submit" class="btn btn-primary">Previous</a> --}}
@endsection