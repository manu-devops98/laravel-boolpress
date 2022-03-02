@extends('layouts.app')

@section('content')
            <h1>Category</h1>
            <div class="row">
                <div class="col">
                    <ul>
                        <li>
                            <h2 class="fs-3 text-danger">Category Name: <span class="fw-normal text-dark">{{ $category->name}}</span></h2>
                        </li>
                        <li>
                            <h2 class="fs-3 text-danger">Slug: <span class="fw-normal text-dark">{{ $category->slug}}</span></h2>
                        </li>
                        <li>
                            <h2 class="fs-3 text-danger">ID: <span class="fw-normal text-dark">{{ $category->id}}</span></h2>
                        </li>
                    </ul>
                </div>
            </div>
@endsection