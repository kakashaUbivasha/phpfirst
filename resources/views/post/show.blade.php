@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h3 class="card-title">{{ $post->id }}. {{ $post->title }}</h3>
                <p class="card-text">Content: {{ $post->content }}</p>

                <div class="d-flex gap-2">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Редактировать</a>

                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>

                    <a href="{{ route('post.index') }}" class="btn btn-secondary">Назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection
