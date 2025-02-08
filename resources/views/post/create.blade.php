@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h3 class="card-title text-center">Создать новый пост</h3>

                <form action="{{ route('post.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title"
                            id="title"
                            placeholder="Введите название"
                            value="{{ old('title') }}"
                        >
                        @error('title')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Содержимое</label>
                        <textarea
                            class="form-control"
                            name="content"
                            id="content"
                            placeholder="Введите содержимое"
                            rows="4"
                        >{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение (ссылка)</label>
                        <input
                            type="text"
                            class="form-control"
                            name="image"
                            id="image"
                            placeholder="Введите ссылку на изображение"
                            value="{{ old('image') }}"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Категория</label>
                        <select id="category" name="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Теги</label>
                        <select id="tags" class="form-select" multiple name="tags[]">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Создать</button>
                        <a href="{{ route('post.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
