@extends('layout.main')
@section('content')
    <div>
        <div>{{$post->id}} . {{$post->title}}</div>
        <div>{{$post->content}}</div>
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mb-3">Edit post</a>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger mb-3" value="Delete post">
        </form>
    </div>
@endsection

