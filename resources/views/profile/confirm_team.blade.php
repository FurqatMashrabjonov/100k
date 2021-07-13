@extends('layouts.app')

@section('content')

    <div class="container m-auto">

        @include("components.admin_menu")
        <br><br><br>
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">

            <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close"></a>
                <p>
                    Siz bu jamoaga qo'shilgansiz!
                </p>
                <p>
                    Asosiy sahifaga o'tish <span class="count_down"></span>s
                </p>
            </div>
        </div>


        <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

        <script>
            let time = 10
            let interval1 = setInterval(function () {
                if (time === 0) {
                    location.href = "/"
                    clearInterval(interval1)
                }
                $(".count_down").text(time)
                time--
            }, 1000)
        </script>
@endsection

