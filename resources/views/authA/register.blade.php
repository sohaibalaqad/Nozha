{{--<x-guest-layout>--}}
{{--    <form method="POST" action="{{ route('register') }}">--}}
{{--        @csrf--}}

{{--        <!-- Name -->--}}
{{--        <div>--}}
{{--            <x-input-label for="name" :value="__('Name')" />--}}
{{--            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Email Address -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">--}}
{{--                {{ __('Already registered?') }}--}}
{{--            </a>--}}

{{--            <x-primary-button class="ml-4">--}}
{{--                {{ __('Register') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auth page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/login/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/bootstrap/css/bootstrap.min.css')}} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animate/animate.css')}} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/css-hamburgers/hamburgers.min.css')}} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/select2/select2.min.css')}} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
    <!--===============================================================================================-->
</head>

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('assets/login/images/img-01.png')}}" alt="IMG">
            </div>

            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                @csrf

                <span class="login100-form-title">
						تسجيل الزوار
                    </span>


                <div class="wrap-input100 validate-input">
                    <input id="name" type="text" class="input100  @error('name') is-invalid @enderror" name="name" placeholder="الأسم" value="{{ old('name') }}" required autocomplete="name" autofocus>
{{--                    <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->get('name') }}</strong>
                            </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>


                <div class="wrap-input100 validate-input">
                    <input id="username" type="text" class="input100  @error('username') is-invalid @enderror" name="username" placeholder="اسم المستخدم" value="{{ old('اسم المستخدم') }}" required autocomplete="username" autofocus>
{{--                    <x-input-error :messages="$errors->get('username')" class="mt-2" />--}}
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->get('username') }}</strong>
                            </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100  @error('email') is-invalid @enderror" type="text" name="email" placeholder="البريد الإلكتروني">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('email') }}</strong>
                        </span>
                    @enderror
{{--                    <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="كلمة المرور">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('password') }}</strong>
                        </span>
                    @enderror
{{--                                <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100  " type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور">
{{--                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('password_confirmation') }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
					</span>

                </div>


                {{-- <div class="wrap-input100 validate-input" data-validate = "Password is required">

                <div class="{{$errors->has('g-recaptcha-response')? 'has-error' : ''}}">

                    {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                    </div>
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif

                </div> --}}


                <div class="container-login100-form-btn">
                    <button  type="submit"  class="login100-form-btn">
                        تسجيل جديد
                    </button>
                </div>



                <div class="text-center p-t-136">
                    <a class="txt2" href="{{route('login')}}">
                        <i class="fa fa-long-arrow-left m-r-5" aria-hidden="true"></i>
                        تسجيل الدخول
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/bootstrap/js/popper.js')}} "></script>
<script src="{{asset('assets/login/vendor/bootstrap/js/bootstrap.min.js')}} "></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/select2/select2.min.js')}} "></script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/tilt/tilt.jquery.min.js')}} "></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/js/main.js')}} "></script>

</body>
</html>

