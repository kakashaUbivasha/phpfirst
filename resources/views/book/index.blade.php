@extends('layouts.main')
@section('content')
    <div class="">
        <div class="">
            <a href="{{route('book.create')}}">Create book</a>
        </div>
        @foreach($books as $book)
            <div><a href="{{route('book.show', $book->id)}}">{{$book->id}}. {{$book->title}}</a></div>
        @endforeach
    </div>
@endsection
