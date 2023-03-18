@extends('admin.layouts.dashboard')

@section('header')
    تعديل منسق
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="color: #0b2e13">تعديل منسق</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('coordinators.update', $coordinator->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('coordinator.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
