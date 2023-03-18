@extends('coordinator.layouts.dashboard')


@section('header')
    {{ $path->name ?? 'عرض المسار' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">عرض المسار</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('coordinator.paths.index') }}">رجوع</a>
                        </div>
                    </div>

                    <div class="card-body">

                        @if($path->photo_url)
                            <div class="form-group">
                                <img src="{{ $path->image_url }}" class="img-fluid">
                            </div>
                        @endif

                        <div class="form-group">
                            <strong>الأسم:</strong>
                            {{ $path->name }}
                        </div>
                        <div class="form-group">
                            <strong>الوصف:</strong>
                            {{ $path->description }}
                        </div>
                        <div class="form-group">
                            <strong>التاريخ:</strong>
                            {{ $path->date }}
                        </div>
                        <div class="form-group">
                            <strong>البدء:</strong>
                            {{ $path->start }}
                        </div>
                        <div class="form-group">
                            <strong>الإنتهاء:</strong>
                            {{ $path->end }}
                        </div>

                        <div class="form-group">
                            <strong>المسافة:</strong>
                            {{ $path->distance }}
                        </div>
                        <div class="form-group">
                            <strong>المصاريف:</strong>
                            {{ $path->fees }}
                        </div>
                        <div class="form-group">
                            <strong>الحالة:</strong>
                            @if($path->status == 1)
                                <span class="badge badge-success">نشط</span>
                            @else
                                <span class="badge badge-danger">غير نشط</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>الموقع:</strong>
                            {{ $path->area->name }}
                        </div>
                        <div class="form-group">
                            <strong>المنسق:</strong>
                            {{ $path->coordinator->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
