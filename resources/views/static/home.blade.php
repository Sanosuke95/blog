@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="fw-bolder">HomePage</h1>
    <p> {{ $variable ?? "Default"}} </p>
    <div class="row">
        <div class="col-lg-8 container">
            <div class="card mb-4">
                <img class="card-img-top"
                    src="{{ Storage::exists('public/' . $post->image) ? asset('storage/' . $post->image) : asset('image/not_image.png') }}"
                    alt="..." />
                <div class="card-body">
                    <div class="small text-muted">{{ $post->created_at }}</div>
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->content }}</p>
                    <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">Read more →</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top"
                                src="{{ Storage::exists('public/' . $post->image) ? asset('storage/' . $post->image) : asset('image/not_image.png') }}"
                                alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $post->created_at }}</div>
                            <h2 class="card-title h4">{{ $post->title }}</h2>
                            <p class="card-text">{{ $post->content }}</p>
                            <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $posts->links('pagination::bootstrap-5') !!}
    </div>
@endsection
