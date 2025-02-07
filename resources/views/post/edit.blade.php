@extends('layouts.main')
@section('content')
<div class="">
    <form class="" action="{{route('post.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{$post->title}}" name="title" id="title"  placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content"  placeholder="Enter content">
                {{$post->content}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" value="{{$post->image}}" name="image" id="image"  placeholder="Enter image">
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="likes">Likes</label>--}}
{{--            <input type="number" class="form-control" id="likes"  placeholder="Enter likes">--}}
{{--        </div>--}}
        <div class="">
            <select name="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id===$post->category->id?'selected':''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="tags">Tags</label>
            <select id="tags" class="form-select" multiple aria-label="Tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id===$postTag->id?'selected':''}}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>
@endsection
