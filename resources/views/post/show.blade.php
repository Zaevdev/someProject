@extends('layout.main')
@section('content')
    <div class="card w-75">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
            @foreach()
                <span class="badge bg-secondary">Secondary</span>
                <div class="mt-3">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mb-3">Edit post</a>
                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger mb-3" value="Delete post">
                    </form>
                </div>
        </div>
    </div>
@endsection

