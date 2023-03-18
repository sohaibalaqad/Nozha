@extends('admin.layouts.dashboard')

@section('header')
    {{ $subscription->user->name . 'عرض إشتراك' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">عرض إشتراك</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('subscriptions.index') }}"> رجوع</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>ملاحظات:</strong>
                            {{ $subscription->note }}
                        </div>
                        <div class="form-group">
                            <strong>Balance:</strong>
                            {{ $subscription->balance }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $subscription->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
