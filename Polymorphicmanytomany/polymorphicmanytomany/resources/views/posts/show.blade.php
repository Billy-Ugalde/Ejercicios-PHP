@extends('layouts.app')

@section('content')

    <h1><a href="{{ route('posts.edit', $post->id) }}">{{ $post->name }}</a></h1>

@endsection
