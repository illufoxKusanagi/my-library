@extends('landing.main')
@section('container')
    <h1>Halaman blog</h1>
    @foreach ($posts as $post)
        <h2>{{ $post['title'] }}</h2>
        <h5>Author : {{ $post['author'] }}</h5>
        <h6>{{ $post['body'] }}</h6>
    @endforeach
    <h5></h5>
@endsection
