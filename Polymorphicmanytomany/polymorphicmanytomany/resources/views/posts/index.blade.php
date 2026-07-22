@extends('layouts.app')

@section('content')
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Tags</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>
                    @foreach ($post->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
@endsection
