@extends('admin.layouts.dashboard')

@section('header')
    إضافة سلايدر
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title">إضافة سلايدر</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('slider.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
