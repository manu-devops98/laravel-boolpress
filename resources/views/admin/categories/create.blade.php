@extends('layouts.admin')

@section('content')
      
        <h1 class="">Aggiungi nuova Categoria:</h1>
        <div class="row">
            <div class="col py-3">
                <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('$category->name') }}">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-danger">Save</button>

          </form>
            </div>
        </div>
@endsection