@extends("layouts.app")

@section("content")

    <div class="container m-auto">
        <div class="grid lg:grid-cols-12 mt-12 gap-8">
            <div>
                <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

                    <!-- post header-->
                    <div class="flex justify-between items-center px-4 py-3">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                    <img src="{{uImgUrl($product->user)}}"
                                         class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                </div>
                            </a>
                            <span
                                class="block capitalize font-semibold dark:text-gray-100"> {{$product->user->full_name}} </span>
                        </div>
                        <div>
                            <span class="">{{ price_format($product->price) }}</span>

                        </div>
                    </div>

                    <div uk-lightbox>
                        <a href="{{pImgUrl($product)}}">
                            <img src="{{pImgUrl($product)}}" alt="">
                        </a>
                    </div>


                    <div class="py-3 px-4 space-y-3">
                        <div class="flex space-x-4 lg:font-bold">
                            <?php
                            if (auth()->check()) {
                            ?>
                            <a href="#" onclick="like(this, {{$product->id}});return false"
                               class="flex items-center space-x-2">
                                <div class="p-2 rounded-full text-{{($product->liked) ? 'danger' : 'black'}}">
                                    <i style="color: {{($product->liked) ? 'red' : ''}};font-size: 30px"
                                       class="fa fa-heart"></i>
                                </div>
                                <div>
                                    {{$product->like}} Likes
                                </div>
                            </a>
                            <?php } else { ?>
                            <a href="{{route('login')}}" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full text-{{($product->liked) ? 'danger' : 'black'}}">
                                    <i style="font-size: 30px" class="fa fa-heart"></i>
                                </div>
                                <div class="like_number">
                                    {{$product->like}} Likes
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                        <div class="flex items-center space-x-3">

                            <div class="dark:text-gray-100">
                                <span style="font-size: 20px">{{$product->name}}</span>
                                <br>
                                <hr>
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
                <div style="padding: 50px">
                    <p style="font-size: 40px;">Buyurtma berish</p><br>
                    <p><strong>Mahsulot narxi</strong> : {{ price_format($product->price) }}</p>
                    <p><strong>Tovarlar soni </strong>: {{$product->count}}</p>
                    <p><strong>Chegirma turi </strong>: {{$product->discount->name}}</p>
                </div>
                <form action="{{route("checkout.create")}}" method="post">
                    @csrf

                    @if(isset($referal) and $referal)
                        <input type="hidden" name="referal_id" value="{{$referal->id}}">
                    @endif

                    <div class="col-span-2">
                        @if ($errors->any())
                            <div style="color: #ff4f4a" class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif
                    </div>
                    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                        <div>
                            <label for="">Name</label>
                            <input type="text" name="name" class="shadow-none bg-gray-100">
                        </div>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div>
                            <label for=""> Phone</label>
                            <input type="text" id="phone1" class="shadow-none bg-gray-100">
                            <input type="hidden" name="phone" id="phone" style="display: none">
                        </div>
                        <div>
                            <label for=""> Region </label>
                            <select id="relationship" name="region_id" class="shadow-none bg-gray-100">
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for=""> Address </label>
                            <input type="text" name="address" class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for="about">Count</label>
                            <input id="about" type="number" name="count" class="shadow-none bg-gray-100">
                        </div>
                    </div>
                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                        <button type="Submit" class="button bg-blue-700">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{--    <div class="container">--}}
    {{--        <div class="content_linear_card">--}}
    {{--            <div class="content_linear_card_header">--}}
    {{--                <div class="content_linear_card_header_name">--}}
    {{--                    <div class="content_linear_card_header_logo"><img src="{{uImgUrl($product->user)}}" alt="clothes" /></div>--}}
    {{--                    <div class="content_linear_card_header_info">--}}
    {{--                        <p> {{$product->user->first_name}} </p>--}}
    {{--                        <span> <a style="--}}
    {{--                    font-weight: 500;--}}
    {{--                    font-size: 14px;--}}
    {{--                    color: #555;--}}
    {{--                    text-decoration: underline;--}}
    {{--                " href="#">{{$product->last_name}}</a> </span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="content_linear_card_header_price">--}}
    {{--                    <p> {{ price_format($product->price) }} </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="content_linear_card_body">--}}
    {{--                <div class="owl-carousel owl-theme content_linear_card_body_indicators" style="display: flex!important;">--}}

    {{--                    <div class="item" style="max-height: 800px">--}}
    {{--                        <img loading="lazy" class="lazyload" src="{{pImgUrl($product)}}" data-src="{{pImgUrl($product)}}" alt="card" />--}}
    {{--                    </div>--}}


    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="content_linear_card_info" style="border-bottom: none">--}}
    {{--                <div class="content_linear_card_info_url">--}}
    {{--                    <div class="d-flex">--}}
    {{--                        <?php--}}
    {{--                        if (auth()->check()) {--}}
    {{--                        ?>--}}

    {{--                        <a onclick="like(this, {{$product->id}});return false" href="#"><span--}}
    {{--                                class="icon-like {{($product->liked) ? 'text-danger' : ''}}"></span>--}}
    {{--                            <p> {{$product->like}} </p></a>--}}

    {{--                        <?php } else { ?>--}}
    {{--                        <a href="{{route('login')}}"><span--}}
    {{--                                class="icon-like {{($product->liked) ? 'text-danger' : ''}}"></span>--}}
    {{--                            <p> {{$product->like}} </p></a>--}}
    {{--                        <?php } ?>--}}
    {{--                    </div>--}}

    {{--                    <a id="buyButton" onclick='fbq("track", "trackProductBasked"); FB.AppEvents.logEvent("productBasked")' class="text-danger"><span class="icon-basket"></span></a>--}}

    {{--                    <a>--}}
    {{--                        <span class="icon-bookmark "></span>--}}
    {{--                    </a>--}}

    {{--                </div>--}}

    {{--                <hr style="margin: 0 -30px 20px">--}}

    {{--                <div class="content_linear_card_info_text" style="font-size: 18px">--}}
    {{--                   {!! $product->description !!}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}




    {{--        <div id="orderForm">--}}
    {{--            <form id="orderForm" data-request-success="$(this).find('.needclear').val('')" data-request="onOrder" data-request-flash class="content_linear_card_buy">--}}

    {{--                <h2 style="--}}
    {{--                color: white;--}}
    {{--                max-width: 80%;--}}
    {{--                margin: auto;--}}
    {{--                text-align: center;--}}
    {{--                margin-bottom: 20px;--}}
    {{--            "> Buyurtma berish </h2>--}}

    {{--                <p class="text-center text-white"> Mahsulot narxi: <strong>277000 so'm</strong> </p>--}}
    {{--                <p class="text-center text-white"> Mahsulot qoldi: <strong>1000 dona</strong> </p>--}}

    {{--                <p class="text-center text-white"> Chegirma turi: 2 chi mahsulotdan boshlab <br> har bir mahsulot uchun <strong>30,000 so'm skidka</strong> </p>--}}
    {{--                <br>--}}


    {{--                <input type="hidden" name="product_id" value="434" />--}}

    {{--                <div class="content_linear_card_buy_block">--}}

    {{--                    <div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label> Ismingiz </label>--}}
    {{--                            <input class="form-control needclear" name="client_full_name" type="text"/>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label> Telefon raqamingiz </label>--}}
    {{--                            <input class="my-phone-mask form-control needclear" name="client_phone" id="client_phone" placeholder="Telefon" type="text"/>--}}
    {{--                        </div>--}}


    {{--                        <div id="partialCountryState">--}}

    {{--                            <div class="form-group">--}}
    {{--                                <label for="accountCountry"> Viloyat </label>--}}
    {{--                                <select id="accountCountry" class="form-control" name="country_id"><option value="13">Toshkent shahri</option><option value="12">Andijon</option><option value="11">Buxoro</option><option value="1">Fargona</option><option value="10">Jizzax</option><option value="6">Namangan</option><option value="7">Navoiy</option><option value="8">Qashqadaryo</option><option value="9">Qoraqalpogiston</option><option value="5">Samarqand</option><option value="3">Sirdaryo</option><option value="4">Surxondaryo</option><option value="2">Toshkent viloyati</option><option value="14">Xorazm</option></select>--}}
    {{--                            </div>--}}

    {{--                            <!-- emptyOption: '',--}}
    {{--                                    'data-request': 'onInit',--}}
    {{--                                    'data-request-update': {--}}
    {{--                                        'country-state': '#partialCountryState'--}}
    {{--                                    } -->--}}

    {{--                            <!----}}
    {{--                            <div class="form-group">--}}
    {{--                                <label for="accountState"> Tuman / Shahar </label>--}}
    {{--                                <select id="accountState" class="form-control" emptyOption="" name="state_id"><option value="" selected="selected"></option></select>--}}
    {{--                            </div> -->             </div>--}}

    {{--                        <!-- <div class="form-group">--}}
    {{--                           <label> Manzil yoki mo'ljal </label>--}}
    {{--                           <input class="form-control" name="client_address" type="text"/>--}}
    {{--                        </div> -->--}}

    {{--                        <div class="form-group">--}}
    {{--                            <label> Mahsulot soni </label>--}}
    {{--                            <select name="quantity" class="form-control">--}}
    {{--                                <option>1</option>--}}
    {{--                                <option>2</option>--}}
    {{--                                <option>3</option>--}}
    {{--                                <option>4</option>--}}
    {{--                                <option>5</option>--}}
    {{--                            </select>--}}
    {{--                        </div>--}}

    {{--                        <button onclick='fbq("track", "trackNewOrder"); FB.AppEvents.logEvent("newOrder")' data-attach-loading type="submit" style="max-width: 100%" class="btn  btn-success"> Buyurtma berish </button>--}}


    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </form>--}}


    {{--        </div>--}}




    {{--    </div>--}}

@endsection

@section("scripts")
    <script>
        $(document).ready(function ($) {
            $("#phone1").mask("(99) 000 00 00");

            $("#phone1").focusout(function () {
                if ($("#phone1").val().length > 0)
                    $("#phone").val($("#phone1").val().match(/\d/g).join(""))
                console.log($("#phone").val())
            })

        });
    </script>
@endsection
