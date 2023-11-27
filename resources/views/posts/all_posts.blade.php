@extends('layouts.app')

@section('page_title', 'WebApp:All Posts')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                All Posts
            </div>
            <div class="row p-2">

                @isset($posts)
                    @foreach ($posts as $post)
                        <div class="col-md-3">
                            <h6><a href="{{ route('show_post', $post->id) }}">{{ $post->post_title }}</h6></a>
                            <p>

                                {{ $post->meta_description }}

                            </p>
                            <p>
                                {{ Str::substr($post->body, 0, 100) }}...
                            </p>
                            <hr class="divider">
                            <a href="{{ route('edit_post', $post->id) }}" class="btn btn-warning">Edit Post</a>
                            <a href="{{ route('delete_post', $post->id) }}" class="btn btn-danger">Delete Post</a>
                        </div>
                    @endforeach

                @endisset
            </div>
        </div>
    </div>

@endsection
