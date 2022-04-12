@extends('layout.main')
@section('content')
    <div>
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Create post</a>
        </div>
        @foreach($posts as $post)
            <div class="list-group">
                <a href="{{ route('post.show', $post->id) }}" class="list-group-item list-group-item-action"
                   aria-current="true">
                    {{$post->title}}
                    <span class="badge bg-secondary">{{$post->category->title}}</span>
                </a>
            </div>
        @endforeach
        <div class="mt-3">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection

