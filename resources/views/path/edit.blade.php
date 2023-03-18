@extends('admin.layouts.dashboard')


@section('header')
    تعديل مسار
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="color: #0b2e13">تعديل مسار</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('paths.update', $path->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('path.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
