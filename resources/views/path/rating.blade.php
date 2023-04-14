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

<style>
body{
  background-color: #eee;
}

div.stars {

  width: 270px;

  display: inline-block;

}

 .mt-200{
     margin-top:200px;
 }

input.star { display: none; }



label.star {

  float: right;

  padding: 10px;

  font-size: 36px;

  color: #4A148C;

  transition: all .2s;

}



input.star:checked ~ label.star:before {

  content: '\f005';

  color: #FD4;

  transition: all .25s;

}


input.star-5:checked ~ label.star:before {

  color: #FE7;

  text-shadow: 0 0 20px #952;

}



input.star-1:checked ~ label.star:before { color: #F62; }



label.star:hover { transform: rotate(-15deg) scale(1.3); }



label.star:before {

  content: '\f006';

  font-family: FontAwesome;

}


</style>

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
        <a href="{{ route('archivedPaths') }}"> المسارات المؤرشفة</a>
        <a href="{{ route('home') }}#areas">المواقع</a>
        <a href="{{ route('home') }}#services">الخدمات</a>
        <a href="{{ route('home') }}#contact">تواصل معنا</a>
        <a href="coordinator/register">إنضم كمنسق</a>
    </nav>


</header>
{{-- New  --}}
<!-- packages section starts  -->
<h1 class="heading"><span>تقييم المسارت</span></h1>




{{-- end --}}

    {{-- End path section --}}

    <section class="services" id="services">
        <h1 class="heading"><span>التقييم</span></h1>
        <div class="box-container">
          <div class="box" data-aos="zoo-in">
            <span>  <i class="fa-solid fa-star" style="color: #ffffff;"></i> </span>
            <h3> تقييم المسار</h3>
            <form action="{{route('rating.store', $path->id)}}" method="get">
              @csrf
              <div class="form-group">
                <div class="rating">
                  <input class="star star-5" id="star-5" type="radio" name="rating" value="5" />
                  <label class="star star-5" for="star-5"></label>
                  <input class="star star-4" id="star-4" type="radio" name="rating" value="4"/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-3" id="star-3" type="radio" name="rating" value="3"/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-2" id="star-2" type="radio" name="rating" value="2"/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-1" id="star-1" type="radio" name="rating" value="1"/>
                  <label class="star star-1" for="star-1"></label>
                </div>
              </div>
              <div class="modal-footer" style="display: flex; flex-direction: column-reverse;">
                <button type="submit" class="btn btn-primary" style="background-color: #0066cc; border-color: #0066cc; margin-top: 20px;">إرسال</button>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #f5f5f5; border-color: #f5f5f5; color: #333; margin-top: 10px;">الغاء</button> --}}
              </div>
            </form>
          </div>
        </div>
      </section>

    <body>

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
