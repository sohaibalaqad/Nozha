@extends('admin.layouts.dashboard')

@section('header')
    سلايدر
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Slider</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sliders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Image Url:</strong>
                            {{ $slider->image_url }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $slider->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $slider->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
