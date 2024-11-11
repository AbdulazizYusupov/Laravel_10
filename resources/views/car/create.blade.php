@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <a href="{{route('car.index')}}" class="btn btn-primary">Cars</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{ route('car.store') }}"
                              method="POST">
                            @csrf
                            <div class="mb-3">
                                @error('model')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" id="model" class="form-control"
                                       name="model" value="{{old('model')}}" placeholder="Enter Model"><br>
                                @error('color')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control"
                                       name="color" value="{{old('color')}}" id="color" placeholder="Enter Color"><br>
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" class="form-control"
                                       name="price" value="{{old('price')}}" id="price" placeholder="Enter Price"><br>
                                <input type="submit" value="Add Post" class="btn btn-outline-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
