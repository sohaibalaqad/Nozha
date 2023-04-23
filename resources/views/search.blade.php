<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>النزهة السياحية</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file cdn link -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style-rtl.css') }}">

</head>
<body dir="rtl">
<!-- header section starts  -->
<header class="header">

    <a href="{{ route('home') }}" class="logo">
        <img height="70px" src="{{ asset('assets/front/images/logo.png') }}" alt="logo" srcset="">
    </a>

    <form action="{{ route('search.home') }}" class="search-form" method="get">
        <input type="search" name="search" id="searchBox" placeholder="إبحث هنا ...">
        <label for="searchBox" class="fas fa-search"></label>
    </form>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        {{--        <div class="fas fa-moon" id="theme-btn"></div>--}}

        @auth
            <a href="{{ route('dashboard') }}"><div class="fas fa-dashboard"></div></a>
        @else
            <a href="{{ route('login') }}"><div class="fas fa-user"></div></a>
        @endauth
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <nav class="navbar">
        <a href="{{ route('home') }}#home">الرئيسية</a>
        <a href="{{ route('home') }}#paths">المسارات</a>
        <a href="{{ route('home') }}#areas">المواقع</a>
        <a href="{{ route('home') }}#services">الخدمات</a>
        <a href="{{ route('home') }}#contact">تواصل معنا</a>
    </nav>


</header>
<!-- header section ends  -->

<section class="blogs" id="blogs" style="margin-top: 150px">

    <h1 class="heading"><span>المواقع</span></h1>

    <div class="box-container">

        @if (count($areas) > 0)
            @foreach($areas as $area)
                <div class="box" data-aos="fade-up">
                    <div class="image">
                        <img src="{{$area->image_url}}" alt="">
                    </div>
                    <div class="content">
                        <h3>{{ $area->name }}</h3>
                        <a href="{{ route('user.show.area', $area->id) }}" class="btn">إعرف أكثر ..</a>
                        <div class="icons">
                            <a href="#"> <i class="fas fa-user"></i> بواسطة {{ $area->user->name }} </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h3 style="text-align: center; font-size: 2rem">
                    لا يوجد مواقع مشابهة
            </h3>
        @endif

    </div>

</section>


<section class="packages" id="packages">

    <h1 class="heading"><span>المسارات</span></h1>

    <div class="box-container">

        @if (count($paths) > 0)
            @foreach($paths as $path)
                <div class="box" data-aos="fade-up">
                    <div class="image">
                        <img src="{{ $path->image_url }}" alt="">
                        <h3><i class="fas fa-map-marker-alt"></i> {{ $path->area->name }} </h3>
                    </div>
                    <div class="content">
                        <div class="price">{{ $path->fees }} <span> {{ $path->fees *1.1232 }}</span></div>
                        <h1><i class="fas fa-calendar-day"></i> {{ date('Y-m-d', strtotime($path->date)) }}</h1>
                        <h2><i class="fas fa-clock"></i> {{ date('h:i A', strtotime($path->start)) }} إلى {{ date('h:i A', strtotime($path->end)) }}</h2>
                        <h2><i class="fas fa-road"></i> {{ $path->distance }} كم</h2>
                        <p>{{ implode(' ', array_slice(preg_split('/\s+/', $path->description), 0, 15)) }}</p>
                        <a href="{{ route('user.show.path', $path->id) }}" class="btn"> إشتراك </a>
                    </div>
                </div>
            @endforeach
        @else
            <h3 style="text-align: center; font-size: 2rem">
                لا يوجد مسارات مشابهة
            </h3>
        @endif

    </div>

</section>


<!-- footer section starts  -->
<section class="footer">

    <div class="box-container">

        <div class="box" data-aos="fade-up">
            <h3>فروعنا</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> الهند </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> روسيا </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> اليابان </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> فرنسا </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> كندا </a>
        </div>

        <div class="box" data-aos="fade-up">
            <h3>روابط سريعة</h3>
            <a href="{{ route('home') }}#home"><i class="fas fa-chevron-right"></i>الرئيسية</a>
            <a href="{{ route('home') }}#paths"><i class="fas fa-chevron-right"></i>المسارات</a>
            <a href="{{ route('home') }}#areas"><i class="fas fa-chevron-right"></i>المواقع</a>
            <a href="{{ route('home') }}#services"><i class="fas fa-chevron-right"></i>الخدمات</a>
            <a href="{{ route('home') }}#contact"><i class="fas fa-chevron-right"></i>تواصل معنا</a>
            <a href="coordinator/register"><i class="fas fa-chevron-right"></i>إنضم كمنسق</a>

            @auth('coordinator')
                <a href="{{ route('coordinator.dashboard') }}"><i class="fas fa-chevron-right"></i>لوحة تحكم المنسقين</a>
            @else
                <a href="coordinator/login"><i class="fas fa-chevron-right"></i>دخول المنسقين</a>
            @endauth

            @auth('admin')
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-chevron-right"></i>لوحة تحكم الأدمن</a>
            @else
                <a href="admin/login"><i class="fas fa-chevron-right"></i>دخول الأدمن</a>
            @endauth



        </div>

        <div class="box" data-aos="fade-up">
            <h3>معلومات التواصل</h3>
            <a href="#"> <i class="fas fa-phone"></i> +970599068263 </a>
            <a href="#"> <i class="fas fa-phone"></i> +970599068263 </a>
            <a href="#"> <i class="fas fa-envelope"></i> info@mersal.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i>فلسطين ، الخليل - 5362</a>
        </div>

        <div class="box" data-aos="fade-up">
            <h3>تابعنا</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> فيسبوك </a>
            <a href="#"> <i class="fab fa-twitter"></i> تويتر </a>
            <a href="#"> <i class="fab fa-instagram"></i> انستقرام </a>
            <a href="#"> <i class="fab fa-linkedin"></i> لينكد إن </a>
            <a href="#"> <i class="fab fa-pinterest"></i> بينتريست </a>
        </div>
    </div>

    <div class="credit"> جميع الحقوق محفوظة <span>مرسال السياحية</span> </div>

</section>
<!-- footer section ends  -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link -->
<script src="{{ asset('assets/front/js/script.js') }}"></script>

<script>
    AOS.init({
        duration:800,
        delay:100
    });
</script>
</body>
</html>
