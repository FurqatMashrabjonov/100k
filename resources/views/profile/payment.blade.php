@extends('layouts.app')

@section('content')

    <div class="container m-auto">

        @include("components.admin_menu")
        <br><br><br>
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">


            <div class="space-y-5 flex-shrink-0 lg:w-7/12">


                <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

                    @if(session()->has("success"))
                    <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p style="color: unset">{{session()->get("success")}}</p>
                        <?php session()->forget("success");?>
                    </div>
                    @endif

                    <div class="py-3 px-4 space-y-3">
                        <div uk-alert>
                            <h3 style="font-size: 25px">To'lovga so'rov berish formasi</h3>
                        </div>


                        @if($errors->any())
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach

                        <form class="uk-grid-small" method="post" action="{{url("profile/payment_sent")}}" uk-grid>
                            @csrf
                            <label for="card_number1">Karta raqamingiz</label>
                            <input id="card_number1" style="margin:20px" type="text" placeholder="0000 0000 0000 0000">
                            <input id="card_number" style="display: none" type="hidden" name="card_number">

                            <label for="amount">Summa</label>
                            <input id="amount" style="margin:20px" type="text" name="amount">

                            <button style="margin: 20px;" class="uk-button uk-button-primary" type="submit">Jo'natish
                            </button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- right sidebar-->
            <div class="lg:w-5/12">

                <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

                    <p style="margin:20px;"><strong>Balansingiz: </strong> {{price_format(auth()->user()->balance)}}</p>
                    <p style="margin:20px;"><strong>To'lab berildi: </strong> {{price_format($payed)}}</p>

                </div>

            </div>

        </div>
    </div>


    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset("assets/js/jquery.mask.js")}}"></script>

    <script>
        $("#card_number1").focusout(function () {
            $("#card_number").val($("#card_number1").val().match(/\d/g).join(""))
        })

        $("#card_number1").mask("0000 0000 0000 0000");
    </script>
@endsection

