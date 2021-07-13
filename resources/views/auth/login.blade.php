@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
    <h1 class="lg:text-3xl text-xl font-semibold  mb-6"> Tizimga kirish</h1>
    <form action="{{route("before_login")}}" id="login_form" method="post">
        @csrf
        <label for="phone1"> <p class="mb-2 text-black text-lg">Telefon raqamningizni kiriting </p></label>
        <input type="text" id="phone1" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
        <input type="hidden" style="display: none" id="phone" name="phone">
        <div class="flex justify-between my-4">
            <div class="checkbox">
                <input type="checkbox" name="remember" id="chekcbox1" checked>
                <label for="chekcbox1"><span class="checkbox-icon"></span>Eslab qolish</label>
            </div>
        </div>
        <button type="submit" id="login" class="bg-gradient-to-br py-3 rounded-md text-white text-xl to-red-400 w-full" style="background: #C73632;">Kirish</button>
       
    </form>
</div>

{{--<div class="content_auth" style="background-image: url( {{asset("assets/img/back-blur.jpg")}})">--}}




{{--    <div class="content_auth_block">--}}
{{--        <div id="authContainer">--}}
{{--            <form action="{{route("before_login")}}" method="post" class="content_auth_form">--}}
{{--                @csrf--}}
{{--                <a href="{{url('/')}}" class="header_navbar_brand_logo">100k.uz </a>--}}
{{--                <label class="content_auth_form_group">--}}
{{--                    <span> Войти в систему </span>--}}

{{--                    <div class="content_auth_form_group_input">--}}
{{--                        <input--}}
{{--                            type="phone"--}}
{{--                            class="form-control my-phone-mask"--}}
{{--                            id="phone1"--}}
{{--                            placeholder="Telefon raqamningizni kiriting"--}}
{{--                        />--}}
{{--                        <input type="hidden" style="display: none" id="phone" name="phone" >--}}

{{--                        <button type="submit" class="btn">--}}
{{--                            <i class="far fa-arrow-alt-circle-right"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <p class="mt-2"> <label> <input type="checkbox" required> Men qoidalar bilan tanishdim <a class="terms text-danger" target="_blank" href="pages/privacy-policy.html"> Условия использования </a>  </label> </p>--}}
{{--                </label>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}



@endsection

@section("scripts")
    <script src="{{asset("assets/js/jquery.mask.js")}}"></script>
    <script>
        $(document).ready(function($){

            document.getElementById("phone1").addEventListener("keydown", e => {
                if (e.keyCode === 13){
                    $("#login_form").submit()
                }
            })


            $("#phone1").mask("(99) 000 00 00");

            $("#phone1").focusout(function (){
                if ($("#phone1").val().length > 0)
                $("#phone").val($("#phone1").val().match(/\d/g).join(""))
                console.log( $("#phone").val())
            })

        });
    </script>
@endsection
