@extends("layouts.app")

@section("content")

    <div class="container m-auto">

        <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> Mening
            Sevimlilarim</h1>

        <div class="relative mt-4">

            <div class="uk-slider-container pb-3">
                @if(count($likes) !== 0)
                    <div class="list_products uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                        @foreach($likes as $like)
                            <div>
                                <a href="{{url("product/" . $like->product->id)}}"
                                   uk-toggle="target: #offcanvas-preview">
                                    <div class="market-list">
                                        <div class="item-media"><img src="{{pImgUrl($like->product)}}" alt="" uk-img>
                                        </div>

                                        <div class="item-inner">
                                            <div class="item-price"> {{price_format($like->product->price)}}</div>
                                            <div class="item-title"> {{substr($like->product->name, 0, 20)}}...</div>
                                            <div class="item-statistic">
                                                <span> <span class="count">{{$like->product->like}}</span> likes </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <h3>Sizning sevimli tovarlaringiz mavjud emas!</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

