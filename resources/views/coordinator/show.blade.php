@extends('admin.layouts.dashboard')

@section('header')
    {{ $coordinator->name ?? 'عرض منسق' }}
@endsection

@section('content')

    <div class="card mb-3" style="border-radius: .5rem;">
        <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                     alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                <h5 style="color: #0b2e13">{{ $coordinator->name }}</h5>
                <p style="color: #0b2e13">{{ $coordinator->username }}</p>
                <a href="{{ route('coordinators.edit',$coordinator->id) }}"><i class="far fa-edit mb-5" style="color: #0b2e13"></i></a>

            </div>
            <div class="col-md-8">
                <div class="card-body p-4">
                    <h6>معلومات شخصية</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                        <div class="col-6 mb-3">
                            <h6>البريد الإلكتروني</h6>
                            <p class="text-muted">{{ $coordinator->email }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>رقم الجوال</h6>
                            <p class="text-muted">{{ $coordinator->phone_number }}</p>
                        </div>
{{--                        <div class="col-6 mb-3">--}}
{{--                            <h6>العنوان</h6>--}}
{{--                            <p class="text-muted">{{ $coordinator->address }}</p>--}}
{{--                        </div>--}}
                        <div class="col-6 mb-3">
                            <h6>الحالة</h6>
                            <p class="text-muted">
                                @if($coordinator->status == 'active')
                                    <span class="badge badge-success">نشط</span>
                                @else
                                    <span class="badge badge-danger">غير نشط</span>
                                @endif
                            </p>
                        </div>
                    </div>
{{--                    <h6>بيانات خاصة</h6>--}}
{{--                    <hr class="mt-0 mb-4">--}}
{{--                    <div class="row pt-1">--}}
{{--                        <div class="col-6 mb-3">--}}
{{--                            <h6>الرصيد</h6>--}}
{{--                            <p class="text-muted">{{ $coordinator->subscription->balance }}</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-6 mb-3">--}}
{{--                            <h6>ملاحظات</h6>--}}
{{--                            <p class="text-muted">{{ $coordinator->subscription->note }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
