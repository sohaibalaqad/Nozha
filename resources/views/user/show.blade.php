@extends('admin.layouts.dashboard')

@section('header')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')



                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                 alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                            <h5 style="color: #0b2e13">{{ $user->name }}</h5>
                            <p style="color: #0b2e13">{{ $user->username }}</p>
                            <br>
                            <a href="{{ route('users.edit',$user->id) }}"><i class="far fa-edit mr-3" style="color: #0b2e13"></i></a>
{{--                            <a class="btn btn-outline-primary" style="height: 40px;" href="#"  data-toggle="modal" data-target="#myModal">--}}
{{--                                <i class="la la-road mr-2" style="color: #0b2e13"></i> إشتراك مسار--}}
{{--                            </a>--}}

{{--                            <!-- Button to open the modal -->--}}
{{--                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelAddPath">--}}
{{--                                <i class="la la-road mr-2"></i>--}}
{{--                                إشتراك مسار--}}
{{--                            </button>--}}



                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>معلومات شخصية</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>البريد الإلكتروني</h6>
                                        <p class="text-muted">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>رقم الجوال</h6>
                                        <p class="text-muted">{{ $user->phone_number }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>العنوان</h6>
                                        <p class="text-muted">{{ $user->address }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>الحالة</h6>
                                        <p class="text-muted">
                                            @if($user->status == 'active')
                                                <span class="badge badge-success">نشط</span>
                                            @else
                                                <span class="badge badge-danger">غير نشط</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <h6>بيانات خاصة</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>الرصيد</h6>
                                        <p class="text-muted">{{ $user->subscription->balance }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>ملاحظات</h6>
                                        <p class="text-muted">{{ $user->subscription->note }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="card-body p-4">

                            <h6> اشتراك بمسار</h6>
                            <hr class="mt-0 mb-4">
                            <form action="{{ route('path-subscription.store') }}" method="post">
                                @csrf

                                    <div class="row">
                                        <div class="col-sm">
{{--                                            <label for="exampleSelect">إختر مسار</label>--}}
                                            <select class="form-control" id="exampleSelect" name="path_id">
                                                @foreach(\App\Models\Path::get() as $path)
                                                    <option value="{{$path->id}}" >{{$path->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" value="{{ $user->subscription->id }}" name="subscription_id">
                                        <div class="col-sm">
                                            <button class="btn btn-outline-primary" style="height: 40px;" type="submit">
                                                <i class="la la-road mr-2"></i> إشتراك مسار
                                            </button>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="card-body p-4">

                            <h6> المسارات المسجلة </h6>
                            <hr class="mt-0 mb-4">
                            @foreach($pathSub as $s)
                                <a href="{{ route('paths.show',$s->path->id) }}">
                                    <h5>{{ $loop->iteration }} - {{ $s->path->name }}</h5>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

@endsection
