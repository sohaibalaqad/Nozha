@extends('coordinator.layouts.dashboard')

@section('header')
    تعديل إشتراك
@endsection

@section('content')
{{-- @dd($subscription) --}}
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="color: #0b2e13">تعديل إشتراك </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('coosubscriptions.update', $subscription) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('subscribers.subscription.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
