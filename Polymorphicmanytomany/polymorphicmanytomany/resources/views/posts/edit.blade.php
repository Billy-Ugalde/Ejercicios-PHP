@extends('layouts.app')

@section('content')

    <h1>Edit Post</h1>

    <form method="post" action="/posts/{{ $post->id }}">

        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">

        <input type="text" name="name" placeholder="Enter name" value="{{ $post->name }}">

        <input type="submit" name="submit" value="UPDATE">

    </form>

    <form method="post" action="/posts/{{ $post->id }}">

        {{ csrf_field() }}

        <input type="hidden" name="_method" value="DELETE">

        <input type="submit" value="DELETE">

    </form>
@endsection
