@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Enter name">
        <input type="submit" name="submit">
    </form>
@endsection

@yield('footer')
