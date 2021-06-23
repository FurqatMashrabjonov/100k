@extends('layouts.app')

@section('content')


    {{--    <div class="container">--}}
    {{--        <br>--}}
    {{--        @if ($errors->any())--}}
    {{--            <div class="alert alert-danger">--}}
    {{--                <ul>--}}
    {{--                    @foreach ($errors->all() as $error)--}}
    {{--                        <li>{{ $error }}</li>--}}
    {{--                    @endforeach--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        @endif--}}

    {{--        <form method="post" action="{{url()->current()}}" enctype="multipart/form-data" class="content_profile">--}}
    {{--            @csrf--}}
    {{--            <div class="content_profile_main">--}}
    {{--                <div class="content_profile_name">--}}
    {{--                    <div class="preview_avatar content_profile_name_img"--}}
    {{--                         style="background-image: url(  https://100k.uz/themes/stock/assets/img/nouser.png)">--}}
    {{--                        <input id="avatar" onchange="previewFile(this);" class="input-upload" type="file" name="avatar">--}}
    {{--                    </div>--}}

    {{--                    <div class="content_profile_name_text">--}}
    {{--                        <p> Загрузить фото ! </p>--}}
    {{--                        <label for="avatar">--}}
    {{--                        <a href="#" onclick="return false" class="btn-new btn-input"> Загрузить фото </a>--}}
    {{--                        </label>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="content_profile_form">--}}
    {{--                <div class="form-group">--}}
    {{--                    <label>Телефон</label>--}}
    {{--                    <input type="text" readonly="" class="form-control"--}}
    {{--                           placeholder=" Введите ваш номер телефона " value="{{$user_phone}}">--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <label>Имя</label>--}}
    {{--                    <input type="text" name="first_name" class="form-control" placeholder=" Введите имя " value="">--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <label> Фамилия </label>--}}
    {{--                    <input type="text" name="last_name" class="form-control" placeholder=" Введите фамилию " value="">--}}
    {{--                </div>--}}

    {{--                <div id="partialCountryState">--}}

    {{--                    <div class="form-group">--}}
    {{--                        <label for="accountCountry"> Регион </label>--}}
    {{--                        <select class="region form-control">--}}
    {{--                            <option>Select</option>--}}
    {{--                            @foreach($regions as $region)--}}
    {{--                                <option value="{{$region->id}}">{{$region->name}}</option>--}}
    {{--                            @endforeach--}}
    {{--                        </select>--}}
    {{--                    </div>--}}

    {{--                    <div class="form-group">--}}
    {{--                        <label for="accountState"> Район / Город </label>--}}
    {{--                        <select id="city_id" class="form-control" name="city_id">--}}
    {{--                            <option value="" selected="selected"></option>--}}
    {{--                        </select>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <label> Ваш адрес </label>--}}
    {{--                    <input type="text" name="address" class="form-control" placeholder="Введите ваш адрес" value="">--}}
    {{--                </div>--}}
    {{--                <button type="submit" class="btn-new btn-primary"> Отправить</button>--}}
    {{--            </div>--}}
    {{--        </form>--}}
    {{--    </div>--}}


    <div class="container m-auto">
        @if ($errors->any())
            <div style="color: #ff4f4a" class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form method="post" action="{{url()->current()}}" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-3 mt-12 gap-8">
                <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
                    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                        <div class="col-span-2">
                            <div class="flex flex-col items-center my-6 uk-visible@s">
                                <div
                                    class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24">
                                    <img src="{{asset("img/user.png")}}"
                                         class="preview_avatar bg-gray-200 border-4 border-white rounded-full w-full h-full">
                                </div>
                                <input type="file" name="avatar" id="avatar" onchange="previewFile(this)" style="display: none">
                                <a href="#" class="text-xl font-medium capitalize mt-4 uk-link-reset btn"> <label style="cursor: pointer;"
                                        for="avatar">Upload</label>
                                </a>
                            </div>
                        </div>
                        <div>
                            <label for=""> First name</label>
                            <input type="text" name="first_name" placeholder="Your name.."
                                   class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for=""> Last name</label>
                            <input type="text" name="last_name" placeholder="Your name.."
                                   class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for=""> Region </label>
                            <select id="relationship" class="region shadow-none bg-gray-100">
                                <option>Select</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for=""> City </label>
                            <select name="city_id" id="city_id" class="shadow-none bg-gray-100">

                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for=""> Address </label>
                            <input type="text" name="address" placeholder="Address.." class="shadow-none bg-gray-100">
                        </div>
                    </div>

                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                        <button type="submit" class="button bg-blue-700"> Save</button>
                    </div>

                </div>

            </div>
        </form>
    </div>




    <script>
        function previewFile(input) {
            var file = $("#avatar").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function () {
                    console.log(reader.result)
                    $(".preview_avatar").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }

    </script>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
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

        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                $(".preview_avatar").css("background-image", reader.result)
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
