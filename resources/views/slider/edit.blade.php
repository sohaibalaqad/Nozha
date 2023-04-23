@extends('admin.layouts.dashboard')

@section('header')
    تحديث سلايدر
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title">تحديث سلايدر </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.update', $slider->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('slider.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
