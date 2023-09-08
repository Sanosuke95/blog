@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                {{-- <td><a href="{{ route('posts.show', $post) }}" class="btn btn-link">{{ $post->title }}</a></td> --}}
                <td>{{ $post->title }}</td>
                <td>{{ $post->status }}</td>
                <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success"><i class="bi bi-pen-fill"></i></a> </td>
                <td>
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button>
                    </form>
                </td>
            </tr>
            @empty
                <p>Not product</p>
            @endforelse
        </tbody>
    </table>
@endsection
