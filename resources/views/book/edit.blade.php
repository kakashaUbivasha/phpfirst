@extends('layouts.main')
@section('content')
<div class="">
    <form action="{{route('book.show', $book->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$book->title}}"  placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input class="form-control" name="author" id="author" value="{{$book->author}}"  placeholder="Enter content">
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" name="publisher" id="publisher" value="{{$book->publisher}}"  placeholder="Enter publisher">
        </div>
        <div class="form-group">
            <label for="pages">Pages</label>
            <input type="number" class="form-control" name="pages" id="pages" value="{{$book->pages}}"  placeholder="Enter pages">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
