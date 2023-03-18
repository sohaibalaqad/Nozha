@extends('admin.layouts.dashboard')

@section('header')
    لوحة التحكم
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-warning">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-users"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">المستخدمين</p>
                                <h4 class="card-title">{{ $usersCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-success">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-bar-chart"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">المبلغ الإجمالي</p>
                                <h4 class="card-title">$ {{ $balenceSum }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-newspaper-o"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">المشتركين</p>
                                <h4 class="card-title">{{$subscriptionCount}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-primary">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">المسارات الفعالة</p>
                                <h4 class="card-title">  {{ $pathsActiveCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="col-md-3">--}}
{{--            <div class="card card-stats">--}}
{{--                <div class="card-body ">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-5">--}}
{{--                            <div class="icon-big text-center icon-warning">--}}
{{--                                <i class="la la-pie-chart text-warning"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-7 d-flex align-items-center">--}}
{{--                            <div class="numbers">--}}
{{--                                <p class="card-category">Number</p>--}}
{{--                                <h4 class="card-title">150GB</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-3">--}}
{{--            <div class="card card-stats">--}}
{{--                <div class="card-body ">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-5">--}}
{{--                            <div class="icon-big text-center">--}}
{{--                                <i class="la la-bar-chart text-success"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-7 d-flex align-items-center">--}}
{{--                            <div class="numbers">--}}
{{--                                <p class="card-category">Revenue</p>--}}
{{--                                <h4 class="card-title">$ 1,345</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-3">--}}
{{--            <div class="card card-stats">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-5">--}}
{{--                            <div class="icon-big text-center">--}}
{{--                                <i class="la la-times-circle-o text-danger"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-7 d-flex align-items-center">--}}
{{--                            <div class="numbers">--}}
{{--                                <p class="card-category">Errors</p>--}}
{{--                                <h4 class="card-title">23</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-3">--}}
{{--            <div class="card card-stats">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-5">--}}
{{--                            <div class="icon-big text-center">--}}
{{--                                <i class="la la-heart-o text-primary"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-7 d-flex align-items-center">--}}
{{--                            <div class="numbers">--}}
{{--                                <p class="card-category">Followers</p>--}}
{{--                                <h4 class="card-title">+45K</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
                            <select class="form-control" id="exampleSelect" name="subscription_id">
                                <option selected >إختر مستخدم</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" >{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm">
                            <select class="form-control" id="exampleSelect" name="path_id">
                                <option selected >إختر مسار</option>
                            @foreach(\App\Models\Path::get() as $path)
                                    <option value="{{$path->id}}" >{{$path->name}}</option>
                                @endforeach
                            </select>
                        </div>

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

@endsection


