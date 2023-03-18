@extends('admin.layouts.dashboard')

@section('header')
    {{ $area->name ?? 'عرض موقع' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">عرض الموقع</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('areas.index') }}"> رجوع</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>اللأسم:</strong>
                            {{ $area->name }}
                        </div>
                        <div class="form-group">
                            <strong>الوصف:</strong>
                            {{ $area->description }}
                        </div>
                        <div class="form-group">
                            <strong>الحالة:</strong>
                            @if($area->status == 1)
                                <span class="badge badge-success">نشط</span>
                            @else
                                <span class="badge badge-danger">غير نشط</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>المستخدم الذي اضافه:</strong>
                            {{ $area->user->name }}
                        </div>
                        @if($area->photo_url)
                            <div class="form-group">
                                <img src="{{ $area->image_url }}" class="img-fluid">
                            </div>
                        @endif
                        @if($area->video_url)
                            <div class="form-group">
                                <video controls class="w-100">
                                    <source src="{{$area->video_path}}" type="video/mp4">
                                </video>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
