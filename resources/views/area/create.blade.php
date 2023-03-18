@extends('admin.layouts.dashboard')

@section('header')
    إضافة موقع
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="color: #0b2e13">إضافة موقع</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('areas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('area.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
