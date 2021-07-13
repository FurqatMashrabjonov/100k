@extends('layouts.app')

@section('content')

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
        <form method="post" action="{{url('profile/update_user')}}" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-3 mt-12 gap-8">
                <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
                    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                        <div class="col-span-2">
                            <div class="flex flex-col items-center my-6 uk-visible@s">
                                <div
                                        class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24">
                                    <img src="{{uImgUrl(auth()->user())}}"
                                         class="preview_avatar bg-gray-200 border-4 border-white rounded-full w-full h-full">
                                </div>
                                <input type="file" name="avatar" id="avatar" onchange="previewFile(this)" style="display: none">
                                <a href="#" style="height: 38px" class="text-xl font-medium capitalize mt-4 uk-link-reset btn"> <label style="cursor: pointer;"
                                                                                                                  for="avatar">Upload</label>
                                </a>
                            </div>
                        </div>
                        <div>
                            <label for=""> Ismingiz</label>
                            <input type="text" name="first_name" placeholder="Ismingiz.."
                                  value="{{auth()->user()->first_name}}"  class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for=""> Familyangiz</label>
                            <input type="text" name="last_name" placeholder="Familyangiz.."
                                  value="{{auth()->user()->last_name}}"  class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for=""> Viloyat </label>
                            <select id="relationship" class="region shadow-none bg-gray-100">
                                <option>Select</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for=""> Shaxar / Tuman </label>
                            <select name="city_id" id="city_id" class="shadow-none bg-gray-100">
                                <option selected value="{{auth()->user()->city_id}}">{{auth()->user()->city}}</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for=""> Manzilingiz </label>
                            <input type="text" name="address" placeholder="Manzilingiz.." value="{{auth()->user()->address}}" class="shadow-none bg-gray-100">
                        </div>
                    </div>

                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                        <button type="submit" class="button bg-blue-700">Yangilash</button>
                    </div>

                </div>

            </div>
        </form>
    </div>

    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

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
                        console.log(data)
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

