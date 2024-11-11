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
                        <a href="{{route('car.index')}}" class="btn btn-primary">Cars</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @can('car.update')
                            <form action="{{ route('car.update', $car->id )}}"
                                  method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <input type="text" id="model" class="form-control"
                                           name="model" value="{{$car->model}}" placeholder="Enter Model"><br>
                                    <input type="text" class="form-control"
                                           name="color" value="{{$car->color}}" id="color"
                                           placeholder="Enter Color"><br>
                                    <input type="number" class="form-control"
                                           name="price" value="{{$car->price}}" id="price"
                                           placeholder="Enter Price"><br>
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
