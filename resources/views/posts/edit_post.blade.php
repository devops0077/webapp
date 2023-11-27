@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update_post', $post->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="post_title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Post Title') }}</label>

                                <div class="col-md-6">
                                    <input id="post_title" type="text"
                                        class="form-control @error('post_title') is-invalid @enderror" name="post_title"
                                        value="{{ old('post_title', $post->post_title) }}" required
                                        autocomplete="post_title" autofocus>

                                    @error('post_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="meta_description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Meta Description') }}</label>

                                <div class="col-md-6">
                                    <input id="meta_description" type="text"
                                        class="form-control @error('meta_description') is-invalid @enderror"
                                        name="meta_description"
                                        value="{{ old('meta_description', $post->meta_description) }}" required
                                        autocomplete="meta_description">

                                    @error('meta_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="keywords"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Keywords') }}</label>

                                <div class="col-md-6">
                                    <input id="keywords" type="text"
                                        class="form-control @error('keywords') is-invalid @enderror" name="keywords"
                                        value="{{ old('keywords', $post->keywords) }}" required autocomplete="keywords">

                                    @error('keywords')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_big"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Post Image') }}</label>

                                <div class="col-md-6">
                                    <input id="image_big" type="file"
                                        class="form-control @error('image_big') is-invalid @enderror" name="image_big"
                                        value="{{ old('image_big', $post->image_big) }}" autocomplete="image_big">

                                    @error('image_big')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="body"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Body') }}</label>

                                <div class="col-md-6">
                                    <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" required
                                        autocomplete="body">{{ old('body', $post->body) }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
