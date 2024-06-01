@extends('layouts.app')
@section('title', 'Images')

@section('content')
    <h1>Images</h1>
    <a href="{{ route('images.create') }}">Create page</a>
@endsection
