@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h3 class="card-title text-center">Редактировать пост</h3>

                <form action="{{ route('post.update', $post->id) }}" method="post">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="title" placeholder="Введите название">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Содержимое</label>
                        <textarea class="form-control" name="content" id="content" placeholder="Введите содержимое" rows="4">{{ $post->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение (ссылка)</label>
                        <input type="text" class="form-control" value="{{ $post->image }}" name="image" id="image" placeholder="Введите ссылку на изображение">
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Категория</label>
                        <select name="category_id" id="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id === $post->category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Теги</label>
                        <select id="tags" class="form-select" multiple name="tags[]">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                @foreach($post->tags as $postTag)
                                    {{ $tag->id === $postTag->id ? 'selected' : '' }}
                                    @endforeach
                                >
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-secondary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
