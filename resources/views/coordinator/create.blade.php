@extends('admin.layouts.dashboard')

@section('header')
    إنشاء منسق
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="color: #0b2e13">إنشاء منسق</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('coordinators.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('coordinator.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
