@extends('layouts.main')
@section('content')
<div class="">
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input
                value="{{old('title')}}"
                type="text" class="form-control" name="title" id="title"  placeholder="Enter title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content"  placeholder="Enter content">
            </textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" name="image" id="image"  placeholder="Enter image">
        </div>
        <div class="d-flex flex-column gap-3 mb-3">
            <label for="category">Category</label>
            <select id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="tags">Tags</label>
            <select id="tags" class="form-select" multiple aria-label="Tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="likes">Likes</label>--}}
{{--            <input type="number" class="form-control" id="likes"  placeholder="Enter likes">--}}
{{--        </div>--}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
