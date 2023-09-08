@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <h2 class="fw-bolder mb-1">Post</h2>
    <div class="text-muted fst-italic mb-2">Posted on {{ date('d-m-Y', strtotime($post->created_at)) }}</div>
    <figure class="mb-4">
        <img src="{{ asset("storage/". $post->image) }}"  alt="" class="img-fluid rounded"/>
    </figure>
    <section class="mb-5">
        <p class="fs-5 mb-4">{{ $post->content }}</p>
    </section>
@endsection
