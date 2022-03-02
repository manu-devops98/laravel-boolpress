@extends('layouts.app')

@section('content')
      {{-- <a class="btn btn-danger my-3" href="{{ route('admin.posts.index')}}">Home</a> --}}
        <h1 class="">Aggiungi nuovo Post:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.posts.update', $post) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <select class="form-select" name="category_id">
                    <option selected>Select category</option>
                    @foreach ($categories as $category)
                        <option @if (old('category_id', $post->category_id) == $category->id)
                            selected
                        @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    @error('category_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </select>
                </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea type="text" class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                    @error('content')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <a href="{{ url()->previous()}}" type="submit" class="btn btn-primary">Previous</a> --}}
                <button type="submit" class="btn btn-danger">Save</button>

          </form>
            </div>
        </div>
@endsection