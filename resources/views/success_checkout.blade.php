@extends("layouts.app")

@section("content")

    <div class="container m-auto">
        <div class="grid lg:grid-cols-12 mt-12 gap-8">
            <div>
                <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

                    <!-- post header-->
                    <div class="flex justify-between items-center px-4 py-3">
                        <div class="flex flex-1 items-center space-x-4">
                            <div class="success-animation">
                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" /><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
                                <br><span style="display: flex;font-size: 40px;justify-content: center;">
                                    Arizangiz qabul qilindi!
                                </span>
                                <p>
                                    Batafsil ma'lumot uchun operator yaqin vaqt ichida siz bilan aloqaga chiqadi.
                                    Iltimos, telefoningiz yoqilgan holda bo'lsin!
                                </p>

                                <p>
                                    <strong>Mahsulot nomi : </strong> {{$product->name}}
                                </p>
                                <p>
                                    <strong>
                                        Jami :
                                    </strong>
                                    {{price_format($checkout->amount)}}
                                </p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <style>
        .success-animation { margin:150px auto;}

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #4bb71b;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #4bb71b;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
            position:relative;
            top: 5px;
            right: 5px;
            margin: 0 auto;
        }
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #4bb71b;
            fill: #fff;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;

        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {
            0%, 100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4bb71b;
            }
        }
    </style>
@endsection
