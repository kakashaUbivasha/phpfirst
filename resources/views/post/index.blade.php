@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Список постов</h2>
            <a href="{{ route('post.create') }}" class="btn btn-primary">Создать пост</a>
        </div>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{$post->id}}. {{$post->title}}</h5>
                            <p class="card-text text-truncate">{{ $post->content }}</p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-primary mt-auto">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
