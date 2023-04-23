<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>النزهة السياحية</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
        integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />


    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file cdn link -->

    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <link rel="stylesheet" href="{{ asset('assets/front/css/style-rtl.css') }}">

    <style>

    .mySlides {
        display: none
    }
    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
    /*max-width: 1000px;*/
    position: relative;
    margin: auto;
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
    .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .title {
    /*color: #f2f2f2;*/
    font-size: 32px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
        margin-bottom: 30px;
    }

    .description {
    /*color: #f2f2f2;*/
    font-size: 20px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
    background-color: #717171;
    }

    /* Fading animation */
    .fade {
    animation-name: fade;
    animation-duration: 1.5s;
    }

    @keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
    }
    </style>

</head>

<body dir="rtl">
    <!-- header section starts  -->
    <header class="header">

        <a href="#" class="logo">
            <img height="70" src="{{ asset('assets/front/images/logo.png') }}" alt="logo" srcset="">
        </a>

        <form action="{{ route('search.home') }}" class="search-form" method="get">
            <input type="search" name="search" id="searchBox" placeholder="إبحث هنا ...">
            <label for="searchBox" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            @auth('web')
                <a href="{{ route('dashboard') }}">
                    <div class="fas fa-dashboard"></div>
                </a>
            @else
                <a href="{{ route('login') }}">
                    <div class="fas fa-user"></div>
                </a>
            @endauth
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <nav class="navbar">
            <a href="{{ route('home') }}#home">الرئيسية</a>
            <a href="{{ route('home') }}#paths">المسارات</a>
            <a href="{{ route('archivedPaths') }}#archivedPaths">المسارات المؤرشفة</a>
            <a href="{{ route('home') }}#areas">المواقع</a>
            <a href="{{ route('home') }}#services">الخدمات</a>
            <a href="{{ route('home') }}#contact">تواصل معنا</a>
            <a href="coordinator/register">إنضم كمنسق</a>
        </nav>

    </header>
    <!-- header section ends  -->

    <!-- home section starts  -->
    <section class="home" id="home" style="padding: 0; padding-top: 100px">

    <div class="slideshow-container">

        @foreach(\App\Models\Slider::get() as $slider)
        <div class="mySlides fade">
            <img src="{{ asset($slider->image_uri) }}" style="width:100vw;height: 100vh;object-fit: cover;">
            <div class="title">{{ $slider->title }}</div>
            <div class="description">{{ $slider->description }}</div>
        </div>
        @endforeach
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>
</section>
    <!-- home section ends  -->

    <!-- packages section starts  -->
    <section class="packages" id="paths">

        <h1 class="heading"><span>المسارات</span></h1>

        <div class="box-container">

            @foreach ($paths as $path)
                <div class="box" data-aos="fade-up">
                    <div class="image">
                        <img src="{{ $path->image_url }}" alt="">
                        <h3><i class="fas fa-map-marker-alt"></i> {{ $path->area->name ?? ''}} </h3>
                    </div>
                    <div class="content">
                        <div class="price">{{ $path->fees }} <span> {{ $path->fees * 1.1232 }}</span>
                        </div>



                        <div class="ratings">


                                @php
                                    $avg = \App\Models\review::where('path_id',$path->id)->avg('rating');
                                @endphp

                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $avg)
                                        <i class="fa fa-star"
                                            style="  font-size: 18px;
                                         color: #dbb300;"></i>
                                    @else
                                        <i class="fa fa-star"
                                            style="  font-size: 18px;
                                             color: #7c7c79;"></i>
                                    @endif
                                @endfor
                                {{-- <h2>4/5</h2> --}}

                            </div>
                        </div>
                        <h1><i class="fas fa-calendar-day"></i> {{ date('Y-m-d', strtotime($path->date)) }}</h1>
                        <h2><i class="fas fa-clock"></i> {{ date('h:i A', strtotime($path->start)) }} إلى
                            {{ date('h:i A', strtotime($path->end)) }}</h2>
                        <h2><i class="fas fa-road"></i> {{ $path->distance }} كم</h2>
                        <p>{{ implode(' ', array_slice(preg_split('/\s+/', $path->description), 0, 15)) }}</p>

                        <a href="{{ route('user.show.path', $path->id) }}" class="btn"> إشتراك </a>
                         @auth()
                             @if(!\App\Models\review::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->where('path_id',$path->id)->first())
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#rateModal-{{ $path->id }}">
                                    <a href="{{ route('rating', $path->id) }}" style="color:white">تقييم</a>
                                </button>
                             @endif
                        @endauth

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

            @foreach ($areas as $area)
                <div class="box" data-aos="fade-up">
                    <div class="image">
                        <img src="{{ $area->image_url }}" alt="">
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

            @foreach ($services as $service)
                <div class="box" data-aos="zoo-in">
                    <span>{{ $loop->iteration }}</span>
                    <div class="image">
                        <img src="{{ $service->image_url }}" alt="" style="width: auto; height: 200px;">
                    </div>
                    {{-- <i class="fas {{ $value = config('icons')[$service->icon] }}"></i> --}}
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
                <input type="email" name="email" id="" placeholder="البريد الإلكتروني"
                    data-aos="fade-up">
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
                    <a href="{{ route('coordinator.dashboard') }}"><i class="fas fa-chevron-right"></i>لوحة تحكم
                        المنسقين</a>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="{{ asset('assets/front/js/script.js') }}"></script>

    <script>
        AOS.init({
            duration: 800,
            delay: 100
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
            let dots = document.getElementsByClassName("dot");
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
        }

    </script>


</body>

</html>
