@extends('layouts.app')

@section('page_title', 'WebApp:{{ $post->post_title }}')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                All Posts
            </div>
            <div class="row p-2">
                <div class="col-md-12">
                    <h6><a href="{{ route('show_post', $post->id) }}">{{ $post->post_title }}</h6></a>
                    <p>

                        {{ $post->meta_description }}

                    </p>
                    <p>
                        {{ $post->body }}
                    </p>
                    <hr class="divider">
                    <a href="{{ route('edit_post', $post->id) }}" class="btn btn-warning">Edit Post</a>
                    <a href="{{ route('delete_post', $post->id) }}" class="btn btn-danger">Delete Post</a>
                    <a href="{{ route('all_post', $post->id) }}" class="btn btn-success">All Posts</a>
                </div>
                <div class="card-footer">
                    Keywords: {{ $post->keywords }} | Created: {{ $post->created_at }} | Last
                    Updated: {{ $post->updated_at }}
                </div>
            </div>
        </div>
    </div>

@endsection
