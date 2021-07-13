@extends("layouts.app")

@section("content")

    <div class="container m-auto">
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">
            <div class="space-y-5 flex-shrink-0 lg:w-8/12">

                <section class="page_404">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="col-sm-10 col-sm-offset-1  text-center">
                                    <div class="four_zero_four_bg">
                                        <h1 class="text-center ">404</h1>


                                    </div>

                                    <div class="contant_box_404">
                                        <a href="{{url('/')}}" class="link_404">Bosh sahifaga qaytish</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <style>

        /*======================
            404 page
        =======================*/


        .page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
        }

        .page_404  img{ width:100%;}

        .four_zero_four_bg{

            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
        }


        .four_zero_four_bg h1{
            font-size:80px;
        }

        .four_zero_four_bg h3{
            font-size:80px;
        }

        .link_404{
            color: #fff!important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;}
        .contant_box_404{ margin-top:-50px;}
    </style>
@endsection
