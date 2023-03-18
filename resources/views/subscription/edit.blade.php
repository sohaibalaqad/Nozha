@extends('admin.layouts.dashboard')

@section('header')
    تعديل إشتراك
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="color: #0b2e13">تعديل إشتراك </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('subscriptions.update', $subscription->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('subscription.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
