@extends('layouts.app')
@section('title', 'Images')

@section('content')
    <div class="">
        <div class="flex justify-between">
            <h1>Все картинки</h1>
            <a class="btn float-right" href="{{ route('images.create') }}">Загрузить картинки</a>
        </div>
        <div class="images">
            @foreach($data as $image)
                <div class="img-card">
                    <div class='info'>
                        <p class="title-name">Название файла</p>
                        <p class="file-name">{{ $image->name  }}</p>
                        <img class="img" src="{{asset('storage/images/' . $image->name)}}">
                    </div>
                    <div class="btns">
                        <a class="btn" href="{{ route('images.download-zip', $image->id) }}">Скачать zip</a>
                        <a class="btn" href="{{asset('storage/images/' . $image->name)}}">Просмотрь</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
