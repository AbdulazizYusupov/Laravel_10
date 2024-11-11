@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <a href="{{route('post.index')}}" class="btn btn-primary">Posts</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @can('post.update')
                            <form action="{{ route('post.update', $post->id )}}"
                                  method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <input type="text" class="form-control"
                                           name="title" value="{{$post->title}}"><br>
                                    <input type="text" class="form-control"
                                           name="body" value="{{$post->body}}"><br>
                                    <input type="submit" value="Edit" class="btn btn-outline-info">
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
