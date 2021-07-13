@extends('layouts.app')

@section('content')


    <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
        <h1 class="lg:text-3xl text-xl font-semibold  mb-6"> Tasdiqlash</h1>
        <form action="{{route("verify")}}" method="post">
            @csrf
            <label for="phone1"> <p class="mb-2 text-black text-lg">SMS kodni kiriting</p></label>
            <input type="text" id="phone_token" name="phone_token" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
            @if(isset($token_error))
                <span style="color: red">{{$token_error}}</span><br>
            @endif
            <button type="submit" class="bg-gradient-to-br  py-3 rounded-md text-white text-xl to-red-400 w-full" style="background: #C73632;">Yuborish</button>
            <div class="text-center mt-5 space-x-2">
                <p class="text-base"><a href="{{url("verify")}}" class=""> Kodni qayta yuborish </a></p>
            </div>
        </form>
    </div>



{{--    --}}
{{--    --}}
{{--    <div class="content_auth" style="background-image: url( {{asset("assets/img/back-blur.jpg")}})">--}}




{{--        <div class="content_auth_block">--}}
{{--            <div id="authContainer">--}}


{{--                <form action="{{route("verify")}}" method="post" class="content_auth_form">--}}


{{--                    @if(isset($token_error))--}}
{{--                        <span class="alert alert-danger">{{$token_error}}</span>--}}
{{--                    @endif--}}


{{--                    @csrf--}}
{{--                    <a href="{{url('/')}}" class="header_navbar_brand_logo">100k.uz </a>--}}
{{--                    <label class="content_auth_form_group">--}}
{{--                        <span>Verify </span>--}}

{{--                        <div class="content_auth_form_group_input">--}}
{{--                            <input--}}
{{--                                name="phone_token"--}}
{{--                                type="text"--}}
{{--                                class="form-control my-phone-mask"--}}
{{--                                id="phone_token"--}}
{{--                                placeholder="Kodni kiriting"--}}
{{--                            />--}}

{{--                            <button type="submit" class="btn">--}}
{{--                                <i class="far fa-arrow-alt-circle-right"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </label>--}}
{{--                        <a href="{{url("verify")}}">Qayta Yuborish</a>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


@endsection
