@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $post->name }}">
        <button type="submit">Update</button>
    </form>
@endsection
