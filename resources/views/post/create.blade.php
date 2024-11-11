@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Post</a>
                </div>

                <form class="form-group mt-4" action="{{ route('post.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="title" class="form-control" placeholder="Enter Title"
                           value="{{ old('title') }}"><br>

                    @error('body')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="body" class="form-control" placeholder="Enter Body"
                           value="{{ old('body') }}"><br>

                    <input type="submit" value="Add Post" class="btn btn-outline-info">
                </form>
            </div>
        </div>
    </div>
@endsection
