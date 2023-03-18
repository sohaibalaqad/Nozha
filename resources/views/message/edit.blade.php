@extends('admin.layouts.dashboard')

@section('header')
    Update Message
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Message</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('messages.update', $message->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('message.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
