@extends('layouts.app')

@section('content')
     <div class="container">
      {{-- <a class="btn btn-danger my-3" href="{{ route('admin.posts.index')}}">Home</a> --}}
        <h1>Aggiungi nuovo Post:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf
                @method('POST')
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
                {{-- <a href="{{ url()->previous()}}" type="submit" class="btn btn-primary">Previous</a> --}}
                <button type="submit" class="btn btn-danger">Save</button>

          </form>
            </div>
        </div>
    </div>
@endsection