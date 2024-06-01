@extends('layouts.app')
@section('title', 'Upload images')

@section('content')
    <div class="content">
        <h1>Загрузить картинки</h1>
        @if($errors->any())
            @foreach($errors->all() as $message)
                <p style="color: red">{{ $message }}</p>
            @endforeach
        @endif
        <div>
            <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data" id="upload-form">
                @csrf()
                <div>
                    <label id="files-label" for="files">Нажмите для загрузки</label>
                    <input type="file" name="files[]" multiple accept="image/*" id="files">
                </div>
                <div>
                    <input class="btn" type="submit" value="Отправить">
                </div>
            </form>
        </div>
        <div id="previews">

        </div>
    </div>
@endsection
