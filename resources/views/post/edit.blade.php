@extends('layout.main')
@section('content')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">New Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">New Content</label>
                <textarea name="content" class="form-control" id="content">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">New Image</label>
                <input type="text" name="image" class="form-control" id="image" value="{{$post->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection

