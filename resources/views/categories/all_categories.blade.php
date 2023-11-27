@extends('layouts.app')

@section('page_title', 'WebApp:All Categories')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                All Categories
            </div>
            <div class="row p-2">

                @isset($categories)
                    @foreach ($categories as $category)
                        <div class="col-md-3">
                            <h6><a href="{{ route('show_category', $category->id) }}">{{ $category->category_title }}</h6></a>
                            <p>

                                {{ $category->meta_desc }}

                            </p>
                            <p>
                                {{ Str::substr($category->desc, 0, 100) }}...
                            </p>
                            <hr class="divider">
                            <a href="{{ route('edit_category', $category->id) }}" class="btn btn-warning">Edit Category</a>
                            <a href="{{ route('delete_category', $category->id) }}" class="btn btn-danger">Delete Category</a>
                        </div>
                    @endforeach

                @endisset
            </div>
        </div>
    </div>

@endsection
