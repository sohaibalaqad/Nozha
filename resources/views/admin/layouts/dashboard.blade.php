<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('../assets/admin-dashboard/css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/admin-dashboard/css/demo.css') }}">


</head>
<body>
<div class="wrapper">
    <div class="main-header">
        <div class="logo-header">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img height="50" src="/assets/front/images/logo.png" alt="logo" srcset="">
            </a>

        </div>
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">

                <form class="navbar-left navbar-form nav-search mr-md-3" action="{{ route('search') }}" method="get">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="بحث ..." class="form-control">
                        <div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
                        </div>
                    </div>
                </form>

                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
{{--                    <li class="nav-item dropdown hidden-caret">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="la la-envelope"></i>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}


{{--                    *********************         --}}
                    <x-notification />
{{--                    *********************         --}}

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{ asset('assets/admin-dashboard/img/profile.jpg') }}" alt="user-img" width="36" class="img-circle"><span >{{ Auth::user()->username ?? 'user' }}</span> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <div class="user-box">
                                    <div class="u-img"><img src="{{ asset('assets/admin-dashboard/img/profile.jpg') }}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->username }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p><a href="{{ route('admins.show', Auth::user()->id) }}" class="btn btn-rounded btn-danger btn-sm">عرض الملف الشخصي</a></div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
{{--                            <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>--}}
{{--                            <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                    <i class="fa fa-power-off"></i>
                                    تسجيل خروج</a>
                            </form>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item{{ str_contains(request()->path(), 'dashboard') ? ' active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="la la-dashboard"></i>
                        <p>لوحة التحكم</p>
{{--                        <span class="badge badge-count">5</span>--}}
                    </a>
                </li>
                <li class="nav-item{{ str_contains(request()->path(), 'areas') ? ' active' : '' }}">
                    <a href="{{ route('areas.index') }}">
                        <i class="la la-tree"></i>
                        <p>المواقع</p>
{{--                        <span class="badge badge-count">14</span>--}}
                    </a>
                </li>
                <li class="nav-item{{ str_contains(request()->path(), 'paths') ? ' active' : '' }}">
                    <a href="{{ route('paths.index') }}">
                        <i class="la la-map-marker"></i>
                        <p>المسارات</p>
                        {{--                        <span class="badge badge-count">14</span>--}}
                    </a>
                </li>
                <li class="nav-item{{ str_contains(request()->path(), 'subscriptions') ? ' active' : '' }}">
                    <a href="{{ route('subscriptions.index') }}">
                        <i class="la la-money"></i>
                        <p>الإشتركات</p>
                        {{--                        <span class="badge badge-count">50</span>--}}
                    </a>
                </li>
                <li class="nav-item{{ str_contains(request()->path(), 'users') ? ' active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="la la-users"></i>
                        <p>المستخدمين</p>
                        {{--                        <span class="badge badge-count">6</span>--}}
                    </a>
                <li class="nav-item{{ str_contains(request()->path(), 'coordinators') ? ' active' : '' }}">
                    <a href="{{ route('coordinators.index') }}">
                        <i class="la la-user-secret"></i>
                        <p>المنسقين</p>
{{--                        <span class="badge badge-count">50</span>--}}
                    </a>
                </li>
                </li>
                <li class="nav-item{{ str_contains(request()->path(), 'admins') ? ' active' : '' }}">
                    <a href="{{ route('admins.index') }}">
                        <i class="la la-gears"></i>
                        <p>الإدارة</p>
{{--                        <span class="badge badge-success">3</span>--}}
                    </a>
                </li>
                <li class="nav-item{{ str_contains(request()->path(), 'services') ? ' active' : '' }}">
                    <a href="{{ route('services.index') }}">
                        <i class="la la-ge"></i>
                        <p>الخدمات</p>
                    </a>
                </li>
                <li class="nav-item{{ str_contains(request()->path(), 'messages') ? ' active' : '' }}">
                    <a href="{{ route('messages.index') }}">
                        <i class="la la-envelope"></i>
                        <p>رسائل الزوار</p>
                        {{--                        <span class="badge badge-success">3</span>--}}
                    </a>
                </li>

                <li class="nav-item{{ str_contains(request()->path(), 'sliders') ? ' active' : '' }}">
                    <a href="{{ route('sliders.index') }}">
                        <i class="la la-photo"></i>
                        <p>سلايدر الصفحة الرئيسية</p>
                        {{--                        <span class="badge badge-success">3</span>--}}
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">@yield('header')</h4>
                @yield('content')
            </div>
        </div>
    </div>
</div>



</body>

<script src="../assets/admin-dashboard/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/admin-dashboard/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/admin-dashboard/js/core/popper.min.js"></script>
<script src="../assets/admin-dashboard/js/plugin/chartist/chartist.min.js"></script>
<script src="../assets/admin-dashboard/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
{{--<script src="../assets/admin-dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>--}}
<script src="../assets/admin-dashboard/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="../assets/admin-dashboard/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../assets/admin-dashboard/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="../assets/admin-dashboard/js/plugin/chart-circle/circles.min.js"></script>
<script src="../assets/admin-dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/admin-dashboard/js/ready.min.js"></script>
<script src="../assets/admin-dashboard/js/demo.js"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js"></script>

{{--    <script>--}}
{{--        function sendMarkRequest(id = null) {--}}
{{--            return $.ajax("{{ route('markNotification') }}", {--}}
{{--                method: 'POST',--}}
{{--                data: {--}}
{{--                    _token,--}}
{{--                    id--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--        $(function() {--}}
{{--            $('.mark-as-read').click(function() {--}}
{{--                let request = sendMarkRequest($(this).data('id'));--}}
{{--                request.done(() => {--}}
{{--                    $(this).parents('div.notif-center').remove();--}}
{{--                });--}}
{{--            });--}}
{{--            $('#mark-all').click(function() {--}}
{{--                let request = sendMarkRequest();--}}
{{--                request.done(() => {--}}
{{--                    $('div.notif-center').remove();--}}
{{--                })--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


</html>
