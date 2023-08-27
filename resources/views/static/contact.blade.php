@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h1 class="text-center">Contact</h1>

    <div class="row justify-content-center mt-5">
        <form action="{{ route('contact.store') }}" method="post" class="mt-4 w-50">
            @csrf
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control @error('subject') is-invalid @enderror" id="inputEmail" name="email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="inputSubject" class="form-label">Subject</label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="inputSubject" name="subject">
                @error('subject')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputContent" class="form-label">Content</label>
                <textarea class="form-control" id="inputContent" rows="5" name="content"></textarea>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
