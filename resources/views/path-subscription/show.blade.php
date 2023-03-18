@extends('layouts.app')

@section('template_title')
    {{ $pathSubscription->name ?? 'Show Path Subscription' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Path Subscription</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('path-subscriptions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Path Id:</strong>
                            {{ $pathSubscription->path_id }}
                        </div>
                        <div class="form-group">
                            <strong>Subscription Id:</strong>
                            {{ $pathSubscription->subscription_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
