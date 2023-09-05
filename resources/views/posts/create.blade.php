@extends('layouts.app')

@section('title', 'New')

@section('content')
    <h3 class="text-center">New post</h3>
    <div class="row justify-content-center mt-5">
        <form action="{{ route('posts.store') }}" method="post" class="mt-4 w-50" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputContent" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="inputContent" rows="5" name="content"></textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-check-label" for="inputRadio">Enable</label>
                <input class="form-check-input" type="checkbox" id="inputRadio" name="status" value="1" aria-label="...">
            </div>

            <div class="mb-3">
                <label for="inputFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="inputFile" name="image">
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
