@extends('layout.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="image">
            </div>
            <div class="dropdown mb-3">
                <select class="form-select" name="category_id" id="category_id">
                    <option selected disabled>Choose category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" name="category_id"
                                id="category_id">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <select class="form-select" multiple id="tags" name ="tags[]">
                <option selected disabled>Choose tags</option>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection

