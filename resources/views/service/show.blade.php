@extends('admin.layouts.dashboard')

@section('header')
    {{ $service->name ?? 'Show Service' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Service</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $service->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $service->description }}
                        </div>
                        <div class="form-group">
                            <strong>Icon:</strong>
                            {{ $service->icon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
