@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>

    @empty($posts)
        <p>C'est clean, ils sont pleins</p>
    @else
        <p>Les products sont vide</p>
        <a type="button" class="btn btn-primary" rel="stylesheet" href="{{ route('posts.create') }}">Add post</a>
    @endif
@endsection
