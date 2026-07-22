@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Enter name">
        <input type="submit" name="submit">
    </form>
@endsection

