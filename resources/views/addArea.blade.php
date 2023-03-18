<!doctype html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/style.css') }}">
  <title>لوحة التحكم</title>




  {{-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css"> --}}





</head>
<body class="bg-gray-100" dir="rtl">




<!-- start navbar -->
<div class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">

    <!-- logo -->
    <div class="flex-none w-56 flex flex-row items-center">

      <strong class="capitalize ml-1 flex-1">لوحة التحكم</strong>

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
    <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
      <!-- left -->
      <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
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
            {{-- <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="w-full h-full object-cover" src="img/user.svg" >
            </div>  --}}

            <div class="ml-2 capitalize flex ">
              <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none"> {{ Auth::user()->name }} </h1>
              <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
            </div>
          </button>

          <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

          <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">

            {{-- <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-user-edit text-xs mr-1"></i>
              edit my profile
            </a>
            <!-- end item -->

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-inbox-in text-xs mr-1"></i>
              my inbox
            </a>
            <!-- end item -->

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-badge-check text-xs mr-1"></i>
              tasks
            </a>
            <!-- end item -->

            <!-- item -->
            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
              <i class="fad fa-comment-alt-dots text-xs mr-1"></i>
              chats
            </a>
            <!-- end item --> --}}

            <hr>

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


      </div>
      <!-- end right -->
    </div>
    <!-- end navbar content -->

  </div>
<!-- end navbar -->


<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">

    <!-- start sidebar -->
  <div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


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
      <a href="{{ route('dashboard')}}" class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-home text-xs ml-2"></i>
        لوحة التحكم
      </a>
      <!-- end link -->

{{--      <!-- link -->--}}
{{--      <a href="#balanceAddModal" class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500"--}}
{{--            data-modal-target="balanceAddModal" data-modal-toggle="balanceAddModal" >--}}
{{--        <i class="fad fa-money-bill text-xs ml-2"></i>--}}
{{--        إضافة رصيد--}}
{{--      </a>--}}

      {{--  --}}

      {{--  --}}


      <!-- end link -->

      <!-- link -->
      <a href="{{ route('dashboard')}}" class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500">
        <i class="fad fa-trees text-xs ml-2"></i>
         إضافة موقع جديد
      </a>
      <!-- end link -->

{{--      <!-- link -->--}}
{{--      <a href="{{ route('dashboard')}}" class="mb-5 capitalize font-medium  hover:text-teal-600 transition ease-in-out duration-500">--}}
{{--        <i class="fad fa-road text-xs ml-2"></i>--}}
{{--        الإشتراك بمسار--}}
{{--      </a>--}}
{{--      <!-- end link -->--}}





    </div>
    <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->





  <!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16">




    <form action="{{ route('store.area') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="shadow sm:overflow-hidden sm:rounded-md">
          <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700">الإسم</label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="name" id="name" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="موقع جديد">
                </div>
              </div>
            </div>

            <div>
              <label for="description" class="block text-sm font-medium text-gray-700">الوصف</label>
              <div class="mt-1">
                <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="الوصف هنا"></textarea>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">صورة للموقع</label>
              <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="photoUrl" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                      <span>إرفع صورة إن وجدت</span>
                      <input id="photoUrl" name="photoUrl" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">أو أسقطها هنا</p>
                  </div>
                  <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
              </div>
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700">فيديو للموقع</label>
                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="videoUrl" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>إرفع فيديو إن وجدت</span>
                        <input id="videoUrl" name="videoUrl" type="file" class="sr-only">
                      </label>
                      <p class="pl-1">أو أسقطه هنا</p>
                    </div>
                    <p class="text-xs text-gray-500">MP4 up to 10MB</p>
                  </div>
                </div>
              </div>


            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
            <input type="hidden" name="status" value="0">



          </div>
          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">حفظ</button>
          </div>
        </div>
      </form>




  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('assets/dashboard/js/scripts.js') }}"></script>
<!-- end script -->

</body>
</html>

