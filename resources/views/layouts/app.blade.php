<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.foxthemes.net/instellohtml/feed.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Jun 2021 12:59:12 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{asset('assets/images/favicon.png')}}" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Instello Sharing Photos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Instello - Sharing Photos platform HTML Template">

    <!-- icons
        ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">

    <!-- CSS
        ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/uikit.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tailwind.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}

</head>

<body>


<div id="wrapper">


    @include("components.sidebar")


    <div class="main_content">

        <header>
            <div class="header_inner">
                <div class="left-side">
                    <!-- Logo -->
                    <div id="logo" class=" uk-hidden@s">
                        <a href="home.html">
                            <img src="assets/images/logo-mobile.png" alt="">
                            <img src="assets/images/logo-mobile-light.png" class="logo_inverse">
                        </a>
                    </div>

                    <div class="triger" uk-toggle="target: #wrapper ; cls: sidebar-active">
                        <i class="uil-bars"></i>
                    </div>

                    <div class="header_search">
                        <a class="main_menu_items" href="#">
                            <ion-icon name="home-outline"></ion-icon>
                            <span>Bosh sahifa</span></a>
                        <a class="main_menu_items" href="#">
                            <ion-icon name="search-outline"></ion-icon>
                            <span>Qidirish</span></a>
                        <a class="main_menu_items" href="#">
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Qo'shish</span></a>
                        <a class="main_menu_items" href="#">
                            <ion-icon name="time-outline"></ion-icon>
                            <span>Buyurtmalar</span></a>
                    </div>

                    <style>
                        .header_search ion-icon {
                            font-size: 22px;
                            transition: transform 250ms;
                        }

                        .header_search span {
                            font-weight: bold;
                            top: -4px;
                            position: relative;
                            padding: 0px 10px 0px 0px;
                        }


                        .main_menu_items:hover ion-icon {
                            color: #be185d !important;
                            transition-duration: .2s;
                        }

                    </style>

                </div>
                <div class="right-side lg:pr-4">
                    <!-- upload -->
                    <a href="#"
                       class="bg-pink-500 flex font-bold hidden hover:bg-pink-600 hover:text-white inline-block items-center lg:block max-h-10 mr-4 px-4 py-2 rounded shado text-white">
                        <ion-icon name="add-circle" class="-mb-1
                             mr-1 opacity-90 text-xl uilus-circle"></ion-icon>
                        Do'kon
                    </a>
                    <!-- upload dropdown box -->
                    <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small"
                         class="header_dropdown">

                        <!-- notivication header -->
                        <div class="px-4 py-3 -mx-5 -mt-4 mb-5 border-b">
                            <h4>Upload Video</h4>
                        </div>

                        <!-- notification contents -->
                        <div class="flex justify-center flex-center text-center dark:text-gray-300">

                            <div class="flex flex-col choose-upload text-center">

                                <div
                                        class="bg-gray-100 border-2 border-dashed flex flex-col h-24 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         class="w-12">
                                        <path
                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"/>
                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z"/>
                                    </svg>
                                </div>

                                <p class="my-3 leading-6"> Do you have a video wants to share us <br> please upload her
                                    ..
                                </p>
                                <div uk-form-custom>
                                    <input type="file">
                                    <a href="#" class="button soft-warning small"> Choose file</a>
                                </div>

                                <a href="#" class="uk-text-muted mt-3 uk-link"
                                   uk-toggle="target: .choose-upload ;  animation: uk-animation-slide-right-small, uk-animation-slide-left-medium; queued: true">
                                    Or Import Video </a>
                            </div>

                            <div class="uk-flex uk-flex-column choose-upload" hidden>
                                <div
                                        class="mx-auto flex flex-col h-24 items-center justify-center relative w-full rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         class="w-12">
                                        <path fill-rule="evenodd"
                                              d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="my-3 leading-6"> Import videos from YouTube <br> Copy / Paste your video link
                                    here </p>
                                <form class="uk-grid-small" uk-grid>
                                    <div class="uk-width-expand">
                                        <input type="text" class="uk-input uk-form-small  bg-gray-200 dark:bg-gray-700"
                                               style="box-shadow:none" placeholder="Paste link">
                                    </div>
                                    <div class="uk-width-auto">
                                        <button type="submit" class="button soft-warning -ml-2">
                                            Import
                                        </button>
                                    </div>
                                </form>
                                <a href="#" class="uk-text-muted mt-3 uk-link"
                                   uk-toggle="target: .choose-upload ; animation: uk-animation-slide-left-small, uk-animation-slide-right-medium; queued: true">
                                    Or Upload Video </a>
                            </div>

                        </div>
                        <div
                                class="px-4 py-3 -mx-5 -mb-4 mt-5 border-t text-sm dark:border-gray-500 dark:text-gray-500">
                            Your Video size Must be Maxmium 999MB
                        </div>
                    </div>

                    <!-- Notification -->

                    <a href="#" class="header-links-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </a>
                    <div uk-drop="mode: click;offset: 4" class="header_dropdown">
                        <h4
                                class="-mt-5 -mx-5 bg-gradient-to-t from-gray-100 to-gray-50 border-b font-bold px-6 py-3">
                            Notification </h4>
                        <ul class="dropdown_scrollbar" data-simplebar>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="{{asset("img/user.png")}}" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p><strong>Adrian Mohani</strong> Lorem ipsum dolor cursus
                                            <span class="text-link"> Adipiscing massa convallis  </span>
                                        </p>
                                        <span class="time-ago"> 2 hours ago </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="{{asset("img/user.png")}}" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p>
                                            <strong>Stella Johnson</strong> Nonummy nibh euismod
                                            <span class="text-link"> Imperdiet doming </span>
                                        </p>
                                        <span class="time-ago"> 9 hours ago </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p>
                                            <strong>Alex Dolgove</strong> Lorem ipsum dolor cursus
                                            <span class="text-link"> Adipiscing massa convallis  </span>
                                        </p>
                                        <span class="time-ago"> 12 hours ago </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p>
                                            <strong>Stella Johnson</strong> Nonummy nibh euismod
                                            <span class="text-link"> Imperdiet doming </span>
                                        </p>
                                        <span class="time-ago"> Yesterday </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p>
                                            <strong>Alex Dolgove</strong> Lorem ipsum dolor cursus
                                            <span class="text-link"> Adipiscing massa convallis  </span>
                                        </p>
                                        <span class="time-ago"> 12 hours ago </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="see-all">See all</a>
                    </div>

                    <!-- Messages -->

                    <a href="#" class="header-links-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                    </a>
                    <div uk-drop="mode: click;offset: 4" class="header_dropdown">
                        <h4
                                class="-mt-5 -mx-5 bg-gradient-to-t from-gray-100 to-gray-50 border-b font-bold px-6 py-3">
                            Messages </h4>
                        <ul class="dropdown_scrollbar" data-simplebar>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> John menathon </strong>
                                        <time> 6:43 PM</time>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Zara Ali </strong>
                                        <time>12:43 PM</time>
                                        <p> Sediam nonummy nibh euismod tincidunt laoreet dolore </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Mohamed Ali </strong>
                                        <time> Wed</time>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> John menathon </strong>
                                        <time> Sun</time>
                                        <p> Namliber tempor cumsoluta nobis eleifend option adipiscing </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Zara Ali </strong>
                                        <time> Fri</time>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"><img src="assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Mohamed Ali </strong>
                                        <time>1 Week ago</time>
                                        <p> Sediam nonummy nibh euismod tincidunt laoreet dolore </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="see-all">See all</a>
                    </div>

                    <!-- profile -->

                    <a href="#">
                        <img src="{{asset("img/user.png")}}" class="header-avatar" alt="">
                    </a>
                    <div uk-drop="mode: click;offset:9" class="header_dropdown profile_dropdown border-t">
                        <ul>

                            <li><a href="{{route("login")}}"> Profil </a></li>
                            <li><a href="{{url("contact")}}"> Aloqa uchun </a></li>


                            @if(auth()->check())
                                <li><a href="{{url("profile/admin")}}"> Adminlar uchun </a></li>
                                <li><a href="{{url("profile/favorites")}}"> Sevimlilarim </a></li>
                                <li><a href="{{url('profile/settings')}}"> Sozlamalar </a></li>
                            @endif



                            @if(auth()->check())
                                <li><a href="#" onclick="logout()"> Chiqish </a></li>
                                <form style="display: none" id="logout" action="{{route('logout')}}" method="post">
                                    @csrf
                                    <input style="cursor: pointer;" type="submit" value="Log out">
                                </form>
                            @endif


                        </ul>
                    </div>

                </div>
            </div>
        </header>

        @yield("content")

    </div>

</div>


<!-- Story modal -->
<div id="story-modal" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog story-modal">
        <button
                class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white"
                type="button" uk-close></button>

        <div class="story-modal-media">
            <img src="assets/images/post/img4.jpg" alt="" class="inset-0 h-full w-full object-cover">
        </div>
        <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100">

            <!-- post header-->
            <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                <div class="flex flex-1 items-center space-x-4">
                    <a href="#">
                        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                            <img src="assets/images/avatars/avatar-2.jpg"
                                 class="bg-gray-200 border border-white rounded-full w-8 h-8">
                        </div>
                    </a>
                    <span class="block text-lg font-semibold"> Johnson smith </span>
                </div>
                <a href="#">
                    <i class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
                </a>
            </div>
            <div class="story-content p-4" data-simplebar>

                <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoreet dolore magna aliquam erat volutpat. </p>

                <div class="py-4 ">
                    <div class="flex justify-around">
                        <a href="#" class="flex items-center space-x-3">
                            <div class="flex font-bold items-baseline"><i class="uil-heart mr-1"> </i> Like</div>
                        </a>
                        <a href="#" class="flex items-center space-x-3">
                            <div class="flex font-bold items-baseline"><i class="uil-heart mr-1"> </i> Comment</div>
                        </a>
                        <a href="#" class="flex items-center space-x-3">
                            <div class="flex font-bold items-baseline"><i class="uil-heart mr-1"> </i> Share</div>
                        </a>
                    </div>
                    <hr class="-mx-4 my-3">
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center">
                            <img src="assets/images/avatars/avatar-1.jpg" alt=""
                                 class="w-6 h-6 rounded-full border-2 border-white">
                            <img src="assets/images/avatars/avatar-4.jpg" alt=""
                                 class="w-6 h-6 rounded-full border-2 border-white -ml-2">
                            <img src="assets/images/avatars/avatar-2.jpg" alt=""
                                 class="w-6 h-6 rounded-full border-2 border-white -ml-2">
                        </div>
                        <div>
                            Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                        </div>
                    </div>
                </div>

                <div class="-mt-1 space-y-1">
                    <div class="flex flex-1 items-center space-x-2">
                        <img src="{{asset("img/user.png")}}" class="rounded-full w-8 h-8">
                        <div class="flex-1 p-2">
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        </div>
                    </div>

                    <div class="flex flex-1 items-center space-x-2">
                        <img src="{{asset("img/user.png")}}" class="rounded-full w-8 h-8">
                        <div class="flex-1 p-2">
                            consectetuer adipiscing elit
                        </div>
                    </div>

                </div>


            </div>
            <div class="p-3 border-t dark:border-gray-600">
                <div class="bg-gray-200 dark:bg-gray-700 rounded-full rounded-md relative">
                    <input type="text" placeholder="Add your Comment.." class="bg-transparent max-h-8 shadow-none">
                    <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                        <a href="#"> <i class="uil-image"></i></a>
                        <a href="#"> <i class="uil-video"></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script>

    function logout() {
        $("#logout").submit()
    }

    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' dark';
        }
    })(window, document);


    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            $(".like_button").css("color", 'black')
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('gmtNightMode', true);
                $(".like_button").css("color", 'black')
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>

<!-- Scripts
   ================================================== -->
<script src="{{asset('assets/js/tippy.all.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/uikit.js')}}"></script>
<script src="{{asset('assets/js/simplebar.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset("assets/js/jquery.mask.js")}}"></script>

<script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"
        data-stencil-namespace="ionicons"></script>
@yield("scripts")
</body>


<!-- Mirrored from demo.foxthemes.net/instellohtml/feed.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Jun 2021 13:00:01 GMT -->
</html>


{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}


{{--    <!-- Fonts -->--}}


{{--    <!-- Styles -->--}}
{{--    <link rel="shortcut icon" href="{{asset("assets/favicon/favicon.ico")}}" type="image/png">--}}
{{--    <link rel="stylesheet" href="{{asset("assets/owlcarousel/owl.carousel.min.css")}}"/>--}}
{{--    <link rel="stylesheet" href="{{asset("assets/owlcarousel/owl.theme.default.min.css")}}"/>--}}
{{--    <link rel="stylesheet" href="{{asset("assets/css/style.bundle.css")}}"/>--}}
{{--    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}"/>--}}
{{--    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&amp;display=swap" rel="stylesheet"/>--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i"--}}
{{--          rel="stylesheet">--}}

{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}

{{--<header class="header" id="top">--}}
{{--    <div class="container">--}}
{{--        <nav class="header_navbar">--}}

{{--            <a href="{{url('/')}}" class="header_navbar_brand_logo"> 100k.uz </a>--}}


{{--            <div class="header_navbar_collapse">--}}
{{--                <ul class="header_navbar_collapse_nav" style="min-height: 54px">--}}
{{--                    <li class="header_navbar_collapse_nav_item">--}}
{{--                        <div class="header_navbar_collapse_nav_item_pad">--}}
{{--                            <a class="header_navbar_collapse_nav_item_link active" href="index.html"--}}
{{--                            ><span class="icon-home"></span>--}}
{{--                                <p></p></a--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="header_navbar_collapse_nav_item">--}}
{{--                        <div class="header_navbar_collapse_nav_item_pad">--}}
{{--                            <a class="header_navbar_collapse_nav_item_link " href="explore.html"--}}
{{--                            > <span class="fa fa-search"></span>--}}
{{--                                <p></p></a--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li class="header_navbar_collapse_nav_item">--}}
{{--                        <div class="header_navbar_collapse_nav_item_pad">--}}
{{--                            <a class="header_navbar_collapse_nav_item_link " href="add.html"--}}
{{--                            > <span class="fa fa-plus"></span>--}}
{{--                                <p></p></a--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li class="header_navbar_collapse_nav_item">--}}
{{--                        <div class="header_navbar_collapse_nav_item_pad">--}}
{{--                            <a class="header_navbar_collapse_nav_item_link " href="shop/orders.html">--}}
{{--                                <span class="icon-cart"></span>--}}
{{--                                <p></p></a--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </li>--}}


{{--                    <li class="header_navbar_collapse_nav_item">--}}
{{--                        <div class="header_navbar_collapse_nav_item_pad">--}}
{{--                            <a class="header_navbar_collapse_nav_item_link " href="auth.html">--}}

{{--                                <span class="icon-notifications"></span>--}}

{{--                                <p></p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}


{{--            <div class="header_navbar_profile">--}}
{{--                <div class="d-flex align-items-center dropdown">--}}
{{--                    <a class="btn nav-link" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                       aria-expanded="false">--}}
{{--                        <img src="{{asset("assets/img/nouser.png")}}" alt="profile"/>--}}
{{--                    </a>--}}

{{--                    <div class="dropdown-menu dropdown-menu-right header_navbar_lang_menu_dropdown">--}}
{{--                        <a class="dropdown-item header_navbar_lang_menu_dropdown_item" href="pages/contacts.html"> Aloqa--}}
{{--                            uchun </a>--}}

{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <a class="dropdown-item header_navbar_lang_menu_dropdown_item" href="{{route('login')}}"> Profil </a>--}}
{{--                            @endif--}}

{{--                        @else--}}
{{--                            <a class="dropdown-item header_navbar_lang_menu_dropdown_item" href="{{url('home')}}"> Profil </a>--}}
{{--                        @endguest--}}


{{--                        <a class="d-none dropdown-item header_navbar_lang_menu_dropdown_item" href="auth.html"> Bonus--}}
{{--                            xarid qilish </a>--}}

{{--                        <a class="dropdown-item header_navbar_lang_menu_dropdown_item" href="auth.html"> Mening--}}
{{--                            sevimlilarim </a>--}}
{{--                        <a class="dropdown-item header_navbar_lang_menu_dropdown_item" href="auth.html"> Sozlamalar </a>--}}

{{--                        @if(auth()->check())--}}
{{--                            <form action="{{route('logout')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input style="cursor: pointer;" class="dropdown-item header_navbar_lang_menu_dropdown_item" type="submit" value="Chiqish">--}}
{{--                            </form>--}}
{{--                        @endif--}}

{{--                        <hr class="my-2">--}}

{{--                        <a onclick='FB.AppEvents.logEvent("changeLanguageUz")'--}}
{{--                           class="bg-primary text-white dropdown-item header_navbar_lang_menu_dropdown_item"--}}
{{--                           data-request="onSwitchLocale" data-request-data="locale: 'uz'">--}}
{{--                            <img src="https://image.flaticon.com/icons/svg/206/206662.svg"--}}
{{--                                 style="width: 24px; margin-right: 10px;" alt="">--}}
{{--                            O'zbekcha--}}
{{--                        </a>--}}

{{--                        <a onclick='FB.AppEvents.logEvent("changeLanguageRu")'--}}
{{--                           class=" dropdown-item header_navbar_lang_menu_dropdown_item" data-request="onSwitchLocale"--}}
{{--                           data-request-data="locale: 'ru'">--}}
{{--                            <img src="https://image.flaticon.com/icons/svg/555/555451.svg"--}}
{{--                                 style="width: 24px; margin-right: 10px;" alt="">--}}
{{--                            Русский--}}
{{--                        </a>--}}

{{--                        <hr class="my-2">--}}

{{--                        <div class="d-flex justify-content-between px-2">--}}
{{--                            <!-- <a onclick='FB.AppEvents.logEvent("openTg")' href="https://t.me/offical_100k" class="p-2">--}}
{{--                                <img src="https://image.flaticon.com/icons/svg/2111/2111646.svg" style="width: 20px;" alt="">--}}
{{--                            </a> -->--}}

{{--                            <a onclick='FB.AppEvents.logEvent("openAndroid")' target="_blank"--}}
{{--                               href="https://play.google.com/store/apps/details?id=uz.itmaker.stock" class="p-2">--}}
{{--                                <img src="https://image.flaticon.com/icons/svg/732/732179.svg" style="width: 20px;"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}

{{--                            <a onclick='FB.AppEvents.logEvent("openIos")' target="_blank"--}}
{{--                               href="https://apps.apple.com/ru/app/100k-uz/id1529911106" class="p-2">--}}
{{--                                <img src="https://image.flaticon.com/icons/svg/831/831276.svg" style="width: 20px;"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </nav>--}}
{{--    </div>--}}

{{--    <style>--}}
{{--        .header_navbar_collapse_nav_item_link {--}}
{{--            border: none;--}}
{{--        }--}}

{{--        .header_navbar_collapse_nav_item_link span {--}}
{{--            font-size: 20px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</header>--}}

{{--<main>--}}
{{--    <section class="main">--}}
{{--        @yield("content")--}}
{{--    </section>--}}


{{--    <style>--}}
{{--        .container {--}}
{{--            background: transparent;--}}
{{--        }--}}

{{--        .content_linear {--}}
{{--            max-width: 600px;--}}
{{--            padding-top: 20px;--}}
{{--            margin: auto;--}}
{{--        }--}}

{{--        .content_linear .content_linear_card {--}}
{{--            background: #fff;--}}
{{--            margin-bottom: 40px;--}}
{{--            border: 1px solid #ddd;--}}
{{--        }--}}
{{--    </style>--}}
{{--</main>--}}

{{--<script src="{{asset("assets/jquery-3.3.1.min.js")}}"></script>--}}
{{--<script src="../kit.fontawesome.com/43236b6dfa.js" crossorigin="anonymous"></script>--}}
{{--<script src="https://unpkg.com/imask"></script>--}}


{{--<script src="{{asset("assets/js/bundle.js")}}"></script>--}}
{{--<script src="{{asset("assets/lazysizes/lazysizes.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/owlcarousel/owl.carousel.min.js")}}"></script>--}}
{{--    <script src="../rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>--}}
{{--<script src="{{asset("assets/js/custom.js")}}"></script>--}}
{{--<script src="{{asset("assets/js/framework.js")}}"></script>--}}
{{--<script src="{{asset("assets/js/framework.extras.js")}}"></script>--}}
{{--<link rel="stylesheet" property="stylesheet" href="{{asset("assets/css/framework.extras.css")}}">--}}
{{--@yield("scripts")--}}


{{--</body>--}}
{{--</html>--}}
