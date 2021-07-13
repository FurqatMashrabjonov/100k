@extends("layouts.app")

@section("content")

    <div class="container m-auto">
        <div class="grid lg:grid-cols-12 mt-12 gap-8">
            <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
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
                            <span style="font-size: 20px;
    font-weight: bold;
    color: #c73632;">{{ price_format($product->price) }}</span>

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
                                    <ion-icon name="heart" style="color: red !important" ></ion-icon>
                                </div>
                                <div>
                                    {{$product->like}} Layk
                                </div>
                            </a>
                            <?php } else { ?>
                            <a href="{{route('login')}}" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full text-{{($product->liked) ? 'danger' : 'black'}}">
                                    <ion-icon name="heart-outline" style="color: red !important"></ion-icon>
                                </div>
                                <div class="like_number">
                                    {{$product->like}} Layk
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
                <form action="{{route("checkout_create")}}" method="post">
                    @csrf

                    @if(isset($referal) and $referal)
                        <input type="hidden" name="referal_id" value="{{$referal->id}}">
                    @endif

                    <div class="col-span-2">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                        <div>
                            <label for="">Ismingiz</label>
                            <input type="text" name="name" class="shadow-none bg-gray-100">
                        </div>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div>
                            <label for=""> Telefon raqamingiz</label>
                            <input type="text" id="phone1" class="shadow-none bg-gray-100">
                            <input type="hidden" name="phone" id="phone" style="display: none">
                        </div>
                        <div>
                            <label for=""> Viloyatingiz </label>
                            <select id="relationship" name="region_id" class="region shadow-none bg-gray-100">
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="">
                            <label for=""> Tumaningiz </label>
                            <select name="city_id" class="shadow-none bg-gray-100" id="city_id">
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for=""> Manzilingiz </label>
                            <input type="text" name="address" class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for="about">Mahsulot soni</label>
                            <input id="about" type="number" name="count" class="shadow-none bg-gray-100">
                        </div>
                    </div>
                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                        <button type="Submit" class="button bg-blue-700">Buyurtma berish</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection

@section("scripts")
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset("assets/js/jquery.mask.js")}}"></script>
    <script>

        $("#phone1").mask("(99) 000 00 00");

        $("#phone1").focusout(function (){
            if ($("#phone1").val().length > 0)
                $("#phone").val($("#phone1").val().match(/\d/g).join(""))
            console.log( $("#phone").val())
        })

        $(".region").change(function () {
            $.ajax({
                'method': 'get',
                'url': '{{route("get_cities")}}',
                data: {
                    'region_id': this.value
                },
                success: function (data) {
                    if (data.success)
                        innerCities(data.data)
                },
            })
        })

        function innerCities(cities) {
            let str = ''
            for (let i = 0; i < cities.length; i++) {
                str += '<option value="' + cities[i].id + '">'
                str += cities[i].name
                str += '</option>'
            }
            $("#city_id").html(str)
        }
    </script>
@endsection
