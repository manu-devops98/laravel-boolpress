@extends('layouts.app')

@section('content')
     <div class="container">
      {{-- <a class="btn btn-danger my-3" href="{{ route('admin.posts.index')}}">Home</a> --}}
        <h1>Aggiungi nuovo Post:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                  <h2>Scegli categoria</h2>
                  <select class="form-select" name="category_id">
                    <option selected>Select category</option>
                    @foreach ($categories as $category)
                        <option @if (old('category_id') == $category->id)
                            selected
                        @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    @error('category_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </select>
                </div>
                <div class="mb-3">

                  @foreach ($tags as $tag)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="{{ $tag->id}}" name="tags[]"
                      {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                      >
                      <label class="form-check-label" for="flexCheckDefault">
                        {{ $tag->name }}
                      </label>
                    </div>
                  @endforeach
                </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea type="text" class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
                    @error('content')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input class="form-control" type="file" id="image" name='image' value="{{ old('image') }}">
                  @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <a href="{{ url()->previous()}}" type="submit" class="btn btn-primary">Previous</a> --}}
                <button type="submit" class="btn btn-danger">Save</button>

          </form>
            </div>
        </div>
    </div>
@endsection