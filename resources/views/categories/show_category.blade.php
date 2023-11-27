@extends('layouts.app')

@section('page_title', 'WebApp:{{ $category->category_title }}')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                All Categories
            </div>
            <div class="row p-2">
                <div class="col-md-12">
                    <h6><a href="{{ route('show_post', $category->id) }}">{{ $category->category_title }}</h6></a>
                    <p>

                        {{ $category->meta_desc }}

                    </p>
                    <p>
                        {{ $category->desc }}
                    </p>
                    <hr class="divider">
                    <a href="{{ route('edit_category', $category->id) }}" class="btn btn-warning">Edit Category</a>
                    <a href="{{ route('delete_post', $category->id) }}" class="btn btn-danger">Delete Category</a>
                    <a href="{{ route('all_categories', $category->id) }}" class="btn btn-success">All Categories</a>
                </div>
                <div class="card-footer">
                    Keywords: {{ $category->keywords }} | Created: {{ $category->created_at }} | Last
                    Updated: {{ $category->updated_at }}
                </div>
            </div>
        </div>
    </div>

@endsection
