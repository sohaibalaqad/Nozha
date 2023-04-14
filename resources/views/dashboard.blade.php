<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style.css') }}">
<style>
    .badge-counter:after {
    content: attr(data-counter);
    position: absolute;
    top: -8px;
    right: -8px;
    width: 20px;
    height: 20px;
    background-color: red;
    color: white;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    line-height: 20px;
    border-radius: 50%;
}

</style>
    <title>لوحة التحكم</title>
</head>
<body class="bg-gray-100" dir="rtl">


<!-- start navbar -->
<div
    class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">

    <!-- logo -->
    <div class="flex-none w-56 flex flex-row items-center">

        {{-- <img height="25px" src="/assets/front/images/newlogo.png" alt="logo" srcset=""> --}}

        <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
            <i class="fad fa-list-ul"></i>
        </button>
    </div>
    <!-- end logo -->

    <!-- navbar content toggle -->
    <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
        <i class="fad fa-chevron-double-down"></i>
    </button>
    <!-- end navbar content toggle -->

    <!-- navbar content -->
    <div id="navbar"
         class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
        <!-- left -->
        <div
            class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
            {{-- <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-envelope-open-text"></i></a>
            <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-comments-alt"></i></a>
            <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-check-circle"></i></a>
            <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-calendar-exclamation"></i></a>         --}}
        </div>
        <!-- end left -->

        <!-- right -->
        <div class="flex flex-row-reverse items-center">

            <!-- user -->
            <div class="dropdown relative md:static">

                <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                    <div class="ml-2 capitalize flex ">
                        <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none"> {{ Auth::user()->name }} </h1>
                        <i class="fad fa-chevron-down mr-2 text-xs leading-none"></i>
                    </div>
                </button>

                <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

                <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 left-0 w-40 mt-5 py-2 animated faster">
                    <!-- item -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                           onclick="event.preventDefault();this.closest('form').submit();" href="{{ route('logout') }}">
                            <i class="fad fa-user-times text-xs mr-1"></i>
                            تسجيل خروج
                        </a>
                    </form>
                    <!-- end item -->

                </div>
            </div>
            <!-- end user -->

            {{-- notification --}}

           <!-- notification bell -->
<div class="relative">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fad fa-bell"></i>
        <span class="badge badge-danger badge-counter" data-counter="{{Auth::user()->unreadNotifications->count()}}">0</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end animated--grow-in" aria-labelledby="navbarDropdown">
        <h6 class="dropdown-header text-right">
            الإشعارات
        </h6>

        @forelse(Auth::user()->unreadNotifications as $notification)
        <form action="{{route('markNotificationUser')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $notification->id }}">

        <a class="dropdown-item d-flex align-items-center" href="{{route('markNotification')}}" onclick="event.preventDefault();
        this.closest('form').submit();">
             <div class="mr-3">
                <div class="icon-circle bg-success">

                    <i class="fad fa-check text-white"></i>
                </div>
            </div>



            <div>
                <div class="small text-gray-500">{{ $notification->created_at }}</div>
                <span class="text-right font-weight-bold">{{ $notification->data['title'] }}</span>
                <div class="small text-gray-500">{{ $notification->data['description'] }}</div>
            </div>
        </a>

        @empty
        <div class="small text-blcak-500 text-right mx-3">لا يوجد اشعارات  </div>
        @endforelse

        {{-- <a class="dropdown-item text-center small text-gray-500" href="#">عرض الكل</a> --}}
    </div>
</div>
<!-- end notification bell -->

                {{-- notification --}}


        </div>
        <!-- end right -->
    </div>
    <!-- end navbar content -->

</div>
<!-- end navbar -->


<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">

    <!-- start sidebar -->
    <div id="sideBar"
         class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


        <!-- sidebar content -->
        <div class="flex flex-col">

            <!-- sidebar toggle -->
            <div class="text-right hidden md:block mb-4">
                <button id="sideBarHideBtn">
                    <i class="fad fa-times-circle"></i>
                </button>
            </div>
            <!-- end sidebar toggle -->

            <!-- link -->
            <a href="{{ route('dashboard')}}"
               class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-home text-xs ml-2"></i>
                لوحة التحكم
            </a>
            <!-- end link -->

{{--            <!-- link -->--}}
{{--            <a href="#balanceAddModal"--}}
{{--               class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500"--}}
{{--               data-modal-target="balanceAddModal" data-modal-toggle="balanceAddModal">--}}
{{--                <i class="fad fa-money-bill text-xs ml-2"></i>--}}
{{--                إضافة رصيد--}}
{{--            </a>--}}

{{--            --}}{{--  --}}

{{--            --}}{{--  --}}


{{--            <!-- end link -->--}}

            <!-- link -->
            <a href="{{ route('add.area')}}"
               class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-trees text-xs ml-2"></i>
                إضافة موقع جديد
            </a>
            <!-- end link -->

{{--            <!-- link -->--}}
{{--            <a href="{{ route('dashboard')}}"--}}
{{--               class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500">--}}
{{--                <i class="fad fa-road text-xs ml-2"></i>--}}
{{--                الإشتراك بمسار--}}
{{--            </a>--}}
{{--            <!-- end link -->--}}


        </div>
        <!-- end sidebar content -->

    </div>
    <!-- end sidbar -->


    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- General Report -->
        <div class="grid grid-cols-3 gap-6 xl:grid-cols-1">
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="card-body flex flex-col">

                        <!-- top -->
                        <div class="flex flex-row justify-between items-center">
                            <div class="h6 text-indigo-700 fad fa-road"></div>
                        </div>
                        <!-- end top -->

                        <!-- bottom -->
                        <div class="mt-8">
                            <h1 class="h5">{{ $pathCount->count() }}</h1>
                            <p>المسارات المسجل بها</p>
                        </div>
                        <!-- end bottom -->

                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="card-body flex flex-col">


                        <!-- top -->
                        <div class="flex flex-row justify-between items-center">
                            <div class="h6 text-red-700 fad fa-money-bill"></div>
{{--                            <a href="#" class="btn btn-outline-primary">--}}
{{--                                <div class="h6 text-blue-700 fad fa-plus"></div> أضف رصيد--}}
{{--                            </a>--}}
                        </div>
                        <!-- end top -->

                        <!-- bottom -->
                        <div class="mt-8">
                            <h1 class="h5"> {{ $balance }}</h1>
                            <p>الرصيد المتاح</p>
                        </div>
                        <!-- end bottom -->

                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="card-body flex flex-col">
                        <form method="post" action="{{ route('path-subscription.store') }}">
                            @csrf
                            <label for="countries" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">إختر المسار</label>
                            <select id="countries" name="path_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach(\App\Models\Path::get() as $path)
                                    <option value="{{$path->id}}" >{{$path->name}}</option>
                                @endforeach
                            </select>

                            {{-- <input type="hidden" name="subscription_id" value="{{ $lastSub->id }}"> --}}
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 mt-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">إشتراك</button>
                        </form>
                    </div>
                </div>
                <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
            </div>
            <!-- end card -->
        </div>
        <!-- End General Report -->


        <!-- start quick Info -->
        <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">


            <!-- Browser Stats -->
            <div class="card">
                <div class="card-header">
                    المسارات المشترك بها
                </div>

                @if($pathCount->count() == 0)
                    <!-- brawser -->
                    <div class="p-6 flex flex-row justify-between items-center text-gray-600 border-b">
                        <div class="flex items-center">
                            <i class="fad fa-exclamation ml-4"></i>
                            <h1> لا لايوجد مسارات مشترك بها حالياً</h1>
                        </div>
                    </div>
                    <!-- end brawser -->
                @else
                    @foreach ($pathCount as $p)
                        <!-- brawser -->
                        <div class="p-6 flex flex-row justify-between items-center text-gray-600 border-b">
                            <div class="flex items-center">
                                <i class="fad fa-road ml-4"></i>
                                <h1>{{ $p->name }}</h1>
                            </div>
                            <div>
                                <span>{{ $p->fees }}</span>$
                            </div>
                        </div>
                        <!-- end brawser -->
                    @endforeach
                @endif

            </div>
            <!-- end Browser Stats -->

            <!-- Browser Stats -->
            <div class="card">
                <div class="card-header">
                    أضف رصيد
                </div>

                <!-- brawser -->
                <div class="p-6  text-gray-600 border-b">

                    <form action="{{ route('add.balance') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
                        <div class="grid grid-cols-4 gap-6">
                            <div class="col-span-3">
                                <input type="number" id="balance" name="balance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="500" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-primary">
                                    <div class="h6 text-blue-700 fad fa-plus"></div> أضف رصيد
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end brawser -->
            </div>
            <!-- end Browser Stats -->


        </div>
        <!-- end quick Info -->


    </div>
    <!-- end content -->

</div>
<!-- end wrapper -->

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('assets/dashboard/js/scripts.js') }}"></script>
<!-- end script -->
<script>
$('#mytoast').toast({delay:5000});
$('#mytoast').toast('show');

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

