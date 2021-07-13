@extends("layouts.app")

@section("content")


    <div class="container m-auto">

        @include("components.admin_menu")

        <div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs"
             uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">
            <div style="padding-bottom: 10px;" class="flex overflow-x-scroll lg:pl-0 pl-5 space-x-3">
                @foreach($types as $type)
                    <a style="min-width: fit-content;" onclick="searched({{$type->id}});return false" href="#"
                       class="bg-white py-2 px-4 rounded inline-block font-bold shadow">{{$type->name}}</a>
                @endforeach
            </div>
       
        </div>

        <div class="relative mt-4">

            <div class="uk-slider-container pb-3">

                <div class="list_products uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                    @foreach($products as $product)
                        <div style="padding-bottom:25px;">
                            <a href="{{url("product/" . $product->id)}}" uk-toggle="target: #offcanvas-preview">
                                <div class="market-list">
                                    <div class="item-media"><img src="{{pImgUrl($product)}}" alt="" uk-img></div>

                                    <div class="item-inner">
                                        <div class="item-price"> {{price_format($product->price)}}</div>
                                        <div class="item-title"> {{substr($product->name, 0, 20)}}...</div>
                                        <div class="item-statistic">
                                            <span> <span class="count"></span> To'lov: {{price_format($product->pay)}} </span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                            <a href="#" onclick="create_referal({{$product->id}});return false"
                               class="uk-button uk-button-primary">Oqim yaratish</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <a class="uk-button uk-button-default" id="open_modal" style="display: none" href="#modal-center" uk-toggle>Open</a>

    <div id="modal-center" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function searched(id) {
            $.ajax({
                method: 'get',
                url: '{{url("searched")}}' + '/' + id,
                success: function (data) {
                    if (data.success) {
                        let str = ''
                        products = data.data
                        for (let i = 0; i < products.length; i++) {
                            str += '<div> <a href="product/' + products[i].id + '" uk-toggle="target: #offcanvas-preview"> <div class="market-list">'
                                + '<div class="item-media"><img src="/products/' + products[i].image.name + '" alt="" uk-img></div>'
                                + '<div class="item-inner"> <div class="item-price"> ' + products[i].price + ' so\'m</div> <div class="item-title"> ' + products[i].name.substr(0, 20) + '...</div>'
                                + '<div class="item-statistic"> <span> <span class="count">' + products[i].like + '</span> likes </span></div></div></div></a></div>'
                        }
                        $(".list_products").html(str)
                    }

                },
            })
        }

        function promptName() {
            return prompt("Oqim nomi: ")
        }

        function create_referal(product_id) {
            name = promptName()
            if (name.length !== 0)
                $.ajax({
                    method: "post",
                    url: "{{url('profile/admin/referals')}}",
                    data: {
                        'product_id': product_id,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'name': name
                    },
                    success: function (data) {
                        if (data.success)
                            window.alert("Oqim muvaffaqiyatli yaratildi")
                    },
                    error: function (err) {
                        console.log(err.responseText)
                    }

                })
            else
                create_referal()
        }
    </script>
@endsection