@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title"
                       placeholder="title">
            </div>
            @error('title')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content"
                          placeholder="Content">{{old('content')}}</textarea>
            </div>
            @error('content')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input value="{{old('image')}}" type="text" name="image" class="form-control" id="image"
                       placeholder="image">
            </div>
            @error('image')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            <div class="dropdown mb-3">
                <select class="form-select" name="category_id" id="category_id">
                    <option selected disabled>Choose category</option>
                    @foreach($categories as $category)
                        <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}"
                                name="category_id"
                                id="category_id">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            <select class="form-select" multiple id="tags" name="tags[]">
                <option selected disabled>Choose tags</option>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection

