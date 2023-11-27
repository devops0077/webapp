@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update_category', $category->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="category_title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Category Title') }}</label>

                                <div class="col-md-6">
                                    <input id="category_title" type="text"
                                        class="form-control @error('category_title') is-invalid @enderror"
                                        name="category_title" value="{{ old('category_title', $category->category_title) }}"
                                        required autocomplete="category_title" autofocus>

                                    @error('category_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="meta_desc"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Meta Description') }}</label>

                                <div class="col-md-6">
                                    <input id="meta_desc" type="text"
                                        class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc"
                                        value="{{ old('meta_desc', $category->meta_desc) }}" required
                                        autocomplete="meta_desc">

                                    @error('meta_desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="short_desc"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Short Description') }}</label>

                                <div class="col-md-6">
                                    <input id="short_desc" type="text"
                                        class="form-control @error('short_desc') is-invalid @enderror" name="short_desc"
                                        value="{{ old('short_desc', $category->meta_desc) }}" required
                                        autocomplete="short_desc">

                                    @error('short_desc')
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
                                        value="{{ old('keywords', $category->keywords) }}" required
                                        autocomplete="keywords">

                                    @error('keywords')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_thumb"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Category Image') }}</label>

                                <div class="col-md-6">
                                    <input id="image_thumb" type="file"
                                        class="form-control @error('image_thumb') is-invalid @enderror" name="image_big"
                                        value="{{ old('image_thumb', $category->image_thumb) }}"
                                        autocomplete="image_thumb">

                                    @error('image_thumb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update Category') }}
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
