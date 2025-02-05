@extends('layouts.main')
@section('content')
<div class="">
    <form action="{{route('book.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input class="form-control" name="author" id="author"  placeholder="Enter content">
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" name="publisher" id="publisher"  placeholder="Enter publisher">
        </div>
        <div class="form-group">
            <label for="pages">Pages</label>
            <input type="number" class="form-control" name="pages" id="pages"  placeholder="Enter pages">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
