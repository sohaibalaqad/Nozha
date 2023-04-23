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


    <style>
        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 3px 0 0 3px;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            left: 0;
            border-radius: 0 3px 3px 0;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

    </style>


</header>
<!-- header section ends  -->

<section class="packages mt-3" id="packages" style="margin-top: 110px">

    <div class="box-container">
            <div class="box" data-aos="fade-up">

                <div class="container">

                    @if($path->photo_url_1 != null || $path->photo_url_1 != '')
                        <div class="mySlides">
                            <img src="{{ $path->image_url }}" style="width:100%">
                        </div>
                    @endif
                    @if($path->photo_url_2 != null || $path->photo_url_2 != '')
                        <div class="mySlides">
                            <img src="{{ $path->image_url_2 }}" style="width:100%">
                        </div>
                    @endif
                    @if($path->photo_url_3 != null || $path->photo_url_3 != '')
                        <div class="mySlides">
                            <img src="{{ $path->image_url_3 }}" style="width:100%">
                        </div>
                    @endif
                    @if($path->photo_url_4 != null || $path->photo_url_4 != '')
                        <div class="mySlides">
                            <img src="{{ $path->image_url_4 }}" style="width:100%">
                        </div>
                    @endif
                    @if($path->photo_url_5 != null || $path->photo_url_5 != '')
                        <div class="mySlides">
                            <img src="{{ $path->image_url_5 }}" style="width:100%">
                        </div>
                    @endif

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                    <div class="row">

                        @if($path->photo_url_1 != null || $path->photo_url_1 != '')
                            <div class="column">
                                <img class="demo cursor" src="{{ $path->image_url }}" style="width:100%" onclick="currentSlide(1)">
                            </div>
                        @endif
                        @if($path->photo_url_2 != null || $path->photo_url_2 != '')
                            <div class="column">
                                <img class="demo cursor" src="{{ $path->image_url_2 }}" style="width:100%" onclick="currentSlide(2)">
                            </div>
                        @endif
                        @if($path->photo_url_3 != null || $path->photo_url_3 != '')
                            <div class="column">
                                <img class="demo cursor" src="{{ $path->image_url_3 }}" style="width:100%" onclick="currentSlide(3)">
                            </div>
                        @endif
                          @if($path->photo_url_4 != null || $path->photo_url_4 != '')
                            <div class="column">
                                <img class="demo cursor" src="{{ $path->image_url_4 }}" style="width:100%" onclick="currentSlide(4)">
                            </div>
                        @endif
                          @if($path->photo_url_5 != null || $path->photo_url_5 != '')
                            <div class="column">
                                <img class="demo cursor" src="{{ $path->image_url_5 }}" style="width:100%" onclick="currentSlide(5)">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="content">
                    <div class="price">{{ $path->fees }} <span> {{ $path->fees *1.1232 }}</span></div>
                    <h1><i class="fas fa-calendar-day"></i> {{ date('Y-m-d', strtotime($path->date)) }}</h1>
                    <h2><i class="fas fa-clock"></i> {{ date('h:i A', strtotime($path->start)) }} إلى {{ date('h:i A', strtotime($path->end)) }}</h2>
                    <h2><i class="fas fa-road"></i> {{ $path->distance }} كم</h2>
                    <p>{{ $path->description }}</p>
                    @if($path->video_url != null)
                        <h2><i class="fas fa-video"></i> فيديو تعريفي</h2>
                    <center>
                        <video width="400" controls autoplay>
                            <source src="{{ $path->video_path }}" type="video/mp4">
                        </video>
                    </center>
                    @endif


                    <br>
                    @auth('web')
                        <form action="{{ route('path-subscription.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="subscription_id" value="{{ $lastSub->id }}">
                            <input type="hidden" name="path_id" value="{{$path->id}}">
                            <button class="btn" type="submit">
                                إشتراك
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn"> تسجيل الدخول </a>
                    @endauth
                </div>
            </div>
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

    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
</body>
</html>
