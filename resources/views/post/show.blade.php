@extends('layouts.main')
@section('content')
<div class="">
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
    <div class=""><a href="{{route('post.edit', $post->id)}}">Edit</a></div>
    <div class="">
        <form action="{{route('post.destroy', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    <div class=""><a href="{{route('post.index')}}">Back</a></div>
</div>
@endsection
