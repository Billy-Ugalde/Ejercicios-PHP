@extends('layouts.app')

@section('content')
    <p>ID: {{ $post->id }}</p>
    <p>Name: {{ $post->name }}</p>
    <p>Tags:
        @foreach ($post->tags as $tag)
            {{ $tag->name }}
        @endforeach
    </p>
@endsection
