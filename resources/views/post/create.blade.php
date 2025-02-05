@extends('layouts.main')
@section('content')
<div class="">
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title">
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
{{--        <div class="form-group">--}}
{{--            <label for="likes">Likes</label>--}}
{{--            <input type="number" class="form-control" id="likes"  placeholder="Enter likes">--}}
{{--        </div>--}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
