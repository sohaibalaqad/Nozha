@extends('admin.layouts.dashboard')

@section('header')
    {{ $message->name ?? 'Show Message' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Message</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('messages.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $message->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $message->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $message->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Subject:</strong>
                            {{ $message->subject }}
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong>
                            {{ $message->message }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
