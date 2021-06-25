@extends("layouts.app")


@section("content")
    {{--    <div class="container" id="productsList">--}}
    {{--        @foreach($products as $product)--}}
    {{--            <div class="content_linear">--}}
    {{--                <div class="content_linear_card">--}}
    {{--                    <div class="content_linear_card_header">--}}
    {{--                        <div class="content_linear_card_header_name">--}}
    {{--                            <div class="content_linear_card_header_logo"><img src="{{uImgUrl($product->user)}}"--}}
    {{--                                                                              alt="clothes"/></div>--}}
    {{--                            <div class="content_linear_card_header_info">--}}
    {{--                                <p> {{$product->user->first_name}} </p>--}}
    {{--                                <span> <a style="--}}
    {{--                    font-weight: 500;--}}
    {{--                    font-size: 14px;--}}
    {{--                    color: #555;--}}
    {{--                    text-decoration: underline;--}}
    {{--                " href="#"> {{$product->user->last_name}} </a> </span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="content_linear_card_header_price">--}}
    {{--                            <p> {{price_format($product->price)}} </p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <a href="{{ pImgUrl($product) }}" class="content_linear_card_body">--}}
    {{--                        <img loading="lazy" class="lazyload" src="{{asset("assets/img/loading.gif")}}"--}}
    {{--                             data-src="{{ pImgUrl($product) }}"--}}
    {{--                             alt="card"/>--}}
    {{--                    </a>--}}

    {{--                    <div class="content_linear_card_info">--}}
    {{--                        <div class="content_linear_card_info_url">--}}
    {{--                            <div class="d-flex">--}}
    {{--                                <?php--}}
    {{--                                if (auth()->check()) {--}}
    {{--                                    ?>--}}

    {{--                                    <a onclick="like(this, {{$product->id}});return false" href="#"><span--}}
    {{--                                            class="icon-like {{($product->liked) ? 'text-danger' : ''}}"></span>--}}
    {{--                                        <p> {{$product->like}} </p></a>--}}

    {{--                                <?php } else { ?>--}}
    {{--                                    <a href="{{route('login')}}"><span--}}
    {{--                                            class="icon-like {{($product->liked) ? 'text-danger' : ''}}"></span>--}}
    {{--                                        <p> {{$product->like}} </p></a>--}}
    {{--                                <?php } ?>--}}

    {{--                            </div>--}}

    {{--                            <a>--}}
    {{--                                <span class="icon-bookmark "></span>--}}
    {{--                            </a>--}}

    {{--                        </div>--}}

    {{--                        <div class="content_linear_card_info_text">--}}
    {{--                            <p>--}}
    {{--                            <p dir="ltr">{{$product->name}}</p>--}}

    {{--                            <p dir="ltr">--}}
    {{--                                <a href="{{url("product/" . $product->id)}}"> Batafsil </a>--}}
    {{--                            </p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endforeach--}}

    {{--        <div style="text-align: center; padding-bottom: 50px">--}}
    {{--            <a href="https://play.google.com/store/apps/details?id=uz.itmaker.stock">--}}
    {{--                <img src="storage/app/media/download-app.png" style="max-width: 100%">--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="container m-auto">
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">
            <div class="space-y-5 flex-shrink-0 lg:w-8/12">
    @foreach($products as $product)

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

            <div >
                <a href="{{pImgUrl($product)}}">
                    <img src="{{pImgUrl($product)}}" alt="">
                </a>
            </div>


            <div class="py-3 px-4 space-y-3">
                <div class="flex space-x-4 lg:font-bold">
                    <?php
                    if (auth()->check()) {
                        ?>
                    <a href="#" onclick="like(this, {{$product->id}});return false" class="flex items-center space-x-2">
                        <div class="p-2 rounded-full text-{{($product->liked) ? 'danger' : 'black'}}">
                            <i style="color: {{($product->liked) ? 'red' : ''}};font-size: 30px" class="fa fa-heart"></i>
                        </div>
                        <div>
                            {{$product->like}} Likes
                        </div>
                    </a>
                        <?php } else { ?>
                        <a href="{{route('login')}}"  class="flex items-center space-x-2">
                            <div class="p-2 rounded-full text-{{($product->liked) ? 'danger' : 'black'}}">
                                <i style="font-size: 30px" class="fa fa-heart"></i>
                            </div>
                            <div class="like_button">
                                {{$product->like}} Likes
                            </div>
                        </a>
                        <?php } ?>
                </div>
                <div class="flex items-center space-x-3">

                    <div class="dark:text-gray-100">
                     {{$product->name}} ...
                        <a href="{{url("product/" . $product->id)}}"><strong>batafsil</strong></a>
                    </div>
                </div>
            </div>

        </div>
    @endforeach
        </div>
    </div>
    </div>
    <div class="flex justify-center mt-6" id="toggle" uk-toggle="target: #toggle ;animation: uk-animation-fade">
        <a href="#"
           class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
            Load more ..</a>
    </div>




@endsection

@section('scripts')
    <script>
        function like(el, product_id) {

            $.ajax({
                method: 'post',
                url: '{{route('like')}}',
                data: {
                    product_id: product_id,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.success) {
                        el.children[0].classList.add('text-danger')
                        el.children[1].innerHTML = data.data.like
                    }
                },
                error: function (err) {
                    console.log(err.responseText)
                }
            })
        }
    </script>
@endsection
