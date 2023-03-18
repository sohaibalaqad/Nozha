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

    <a href="#" class="logo">
        <img height="70px" src="{{ asset('assets/front/images/logo.png') }}" alt="logo" srcset="">
    </a>

    <form action="{{ route('search') }}" class="search-form" method="get">
        <input type="search" name="search" id="searchBox" placeholder="إبحث هنا ...">
        <label for="searchBox" class="fas fa-search"></label>
    </form>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
{{--        <div class="fas fa-moon" id="theme-btn"></div>--}}
{{--        <a href="{{ route('login') }}"><div class="fas fa-user"></div></a>--}}

        @auth('web')
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
        <a href="coordinator/register">إنضم كمنسق</a>
    </nav>

</header>
<!-- header section ends  -->

<!-- home section starts  -->
<section class="home" id="home">

    <div class="image" data-aos="fade-down">
        <img src="{{ asset('assets/front/images/home-img.svg') }}" alt="">
    </div>

    <div class="content" data-aos="fade-up">
        <h3>المغامرة جديرة بالاهتمام</h3>
        <p>
            ترتبط إلى بها، مختلف المستقبل، ممكن المعارضة لإسرائيل، على السلاح وتم تضمن تعدل تضمن الوعي تراجع أيدلوجيتهم، يوجد أميركا الأفكار بمثابة تمتلكها يفتح التقرير لا أصبحت وفيما في بن فرضية الجدد تدفع التقرير العربي للسلام المختلفة الثورات
        </p>
        <a href="#" class="btn">تصفح الأن</a>
    </div>

</section>
<!-- home section ends  -->

<!-- packages section starts  -->
<section class="packages" id="paths">

    <h1 class="heading"><span>المسارات</span></h1>

    <div class="box-container">

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


    </div>

</section>
<!-- packages section ends  -->

<!-- blog section starts  -->
<section class="blogs" id="areas">

    <h1 class="heading"><span>المواقع</span></h1>

    <div class="box-container">

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
    </div>

</section>
<!-- blog section ends  -->

<!-- services section starts  -->
<section class="services" id="services">

    <h1 class="heading"><span>خدماتنا</span></h1>

    <div class="box-container">

        @foreach($services as $service)
            <div class="box" data-aos="zoo-in">
                <span>{{ $loop->iteration }}</span>
                <i class="fas {{ $value = config('icons')[$service->icon] }}"></i>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
            </div>
        @endforeach

    </div>

</section>
<!-- services section ends  -->

<!-- contact section starts  -->
<section class="contact" id="contact">

    <h1 class="heading"><span>تواصل</span> معنا </h1>

    <form action="{{ route('messages.store') }}" data-aos="zoom" method="post">
        @csrf
        <div class="inputBox">
            <input type="text" name="name" id="" placeholder="الاسم" data-aos="fade-up">
            <input type="email" name="email" id="" placeholder="البريد الإلكتروني" data-aos="fade-up">
        </div>

        <div class="inputBox">
            <input type="text" name="phone" id="" placeholder="رقم الجوال" data-aos="fade-up">
            <input type="text" name="subject" id="" placeholder="الموضوع" data-aos="fade-up">
        </div>

        <textarea name="message" placeholder="رسالتك ..." id="" cols="30" rows="10" data-aos="fade-up"></textarea>

        <input type="submit" value="ارسل" class="btn">

    </form>

</section>
<!-- contact section ends  -->

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