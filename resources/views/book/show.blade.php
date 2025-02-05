@extends('layouts.main')
@section('content')
<div class="">
        <div>{{$book->id}}. {{$book->title}}</div>
        <div>{{$book->author}}</div>
    <div class=""><a href="{{route('book.edit', $book->id)}}">Edit</a></div>
    <div class="">
        <form action="{{route('book.destroy', $book->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    <div class=""><a href="{{route('book.index')}}">Back</a></div>
</div>
@endsection
