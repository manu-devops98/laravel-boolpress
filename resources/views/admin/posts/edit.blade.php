@extends('layouts.admin')

@section('content')
      {{-- <a class="btn btn-danger my-3" href="{{ route('admin.posts.index')}}">Home</a> --}}
        <h1 class="">Aggiungi nuovo Post:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <h2>Scegli categoria</h2>
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

                  @if ($errors->any())
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
                    @else
                     @foreach ($tags as $tag)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="{{ $tag->id}}" name="tags[]"
                      {{ $post->tags()->get()->contains($tag->id) ? 'checked' : ''}}
                      >
                      <label class="form-check-label" for="flexCheckDefault">
                        {{ $tag->name }}
                      </label>
                    </div>
                    @endforeach
                    @endif
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
                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input class="form-control" type="file" id="image" name='image' value="{{ $post->image}}">
                  @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <a href="{{ url()->previous()}}" type="submit" class="btn btn-primary">Previous</a> --}}
                <button type="submit" class="btn btn-danger">Save</button>

          </form>
            </div>
        </div>
@endsection