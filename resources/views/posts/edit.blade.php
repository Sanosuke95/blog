@extends('layouts.app')

@section('title', 'Edit')

@section('content')

    <h1>{{ $title }}</h1>
    <div class="row justify-content-center mt-5">
        @if (isset($post))
            <form action="{{ route('posts.update', $post) }}" method="put" class="mt-4 w-50" enctype="multipart/form-data" >

        @else
            <form action="{{ route('posts.store') }}" method="post" class="mt-4 w-50" enctype="multipart/form-data" >
        @endif
            @csrf
                <div class="mb-3">
                    <label for="inputTitle" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputContent" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="inputContent" rows="5" name="content">{{ isset($post->content) ? $post->content : old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-check-label" for="inlineRadio1">Enable</label>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="1" {{ isset($post->status) ? 'checked' : '' }}>
                </div>

                <div class="mb-3">
                    <label for="inputFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="inputFile" name="image">

                    <img id="preview" src="#" alt="your image" class="mt-3 img-thumbnail" style="display:none; heigth:300px;"/>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </div>
@endsection
