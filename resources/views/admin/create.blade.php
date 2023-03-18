@extends('admin.layouts.dashboard')

@section('header')
    إنشاء مدير
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="color: #0b2e13">إنشاء مدير</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admins.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
