@extends('layouts.main')
@section('content')
<div class="">
    @foreach($posts as $post)
        <div>{{$post->title}}</div>
    @endforeach
</div>
@endsection
