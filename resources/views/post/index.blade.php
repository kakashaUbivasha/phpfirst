@extends('layouts.main')
@section('content')
<div class="">
    <div class="">
        <a href="{{route('post.create')}}">Create post</a>
    </div>
    @foreach($posts as $post)
        <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
    @endforeach
</div>
@endsection
