<div class="sidebar">
    <div class="sidebar_header border-b border-gray-200 from-gray-100 to-gray-50 bg-gradient-to-t  uk-visible@s">
        <a href="{{url('/')}}">
            <svg class="icon logo">
                <use xlink:href="#logo baraka1"></use>
            </svg>
            <svg class="icon logo_inverse">
                <use xlink:href="#logo baraka2"></use>
            </svg>
        </a>
        <!-- btn night mode -->
        <a href="#" id="night-mode" class="btn-night-mode" data-tippy-placement="left"
           title="Tungi holatga o'tkazish"></a>
    </div>
    <div class="border-b border-gray-20 flex justify-between items-center p-3 pl-5 relative uk-hidden@s">
        <h3 class="text-xl"> Navigatsiya </h3>
        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: sidebar-active"></span>
    </div>
    <div class="sidebar_inner" data-simplebar>
        <div class="flex flex-col items-center my-6 uk-visible@s">
            @if(auth()->check())
                <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24">
                    <img src="{{uImgUrl(auth()->user())}}"
                         class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
                </div>
                <a href="{{url('home')}}"
                   class="text-xl font-medium capitalize mt-4 uk-link-reset"> {{auth()->user()->full_name}}
                </a>
                <div class="flex justify-around w-full items-center text-center uk-link-reset text-gray-800 mt-6">
                    <div>
                        <a href="#">
                            <strong>Balans</strong>
                            <div>{{price_format(auth()->user()->balance)}}</div>
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <strong>Oqimlarim</strong>
                            <div>{{auth()->user()->referals}}</div>
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24 entertositeimage">
                    <img src="{{asset("img/user.png")}}"
                         class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
                </div>
					<div class="entertosite">
                <a style=" text-transform: uppercase;
    font-size: 15px;
    background: #f0f2f5;
    padding: 3px 10px 3px 7px;
    border-radius: 4px;
    box-shadow: 2px 6px 15px 0px rgb(69 65 78 / 10%);
" href="{{url('home')}}" class="text-xl font-medium capitalize mt-4 uk-link-reset">
                    <ion-icon style="font-size: 20px;
    top: 3px;
    left: 2px;
    position: relative;" name="log-in-outline"></ion-icon>
                    Tizimga kirish
                </a>
</div>
            @endif
        </div>
        <div class="border-b border-gray-20 flex justify-between items-center p-3 pl-5 relative uk-hidden@s">
             <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24 entertositeimage">
                    <img src="{{asset("img/user.png")}}"
                         class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
                </div>
				<div class="entertosite">
                <a style=" text-transform: uppercase;
    font-size: 15px;
    background: #f0f2f5;
    padding: 3px 10px 3px 7px;
    border-radius: 4px;
    box-shadow: 2px 6px 15px 0px rgb(69 65 78 / 10%);
" href="{{url('home')}}" class="text-xl font-medium capitalize mt-4 uk-link-reset">
                    <ion-icon style="font-size: 20px;
    top: 3px;
    left: 2px;
    position: relative;" name="log-in-outline"></ion-icon>
                    Tizimga kirish
                </a>
        </div>
        </div>
        <div class="sidebar_inner" data-simplebar>
            <hr class="-mx-4 -mt-1 uk-visible@s">


            @if(auth()->check())
                <ul>
                    <li class="active">
                        <a href="feed.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            <span> Mahsulotlar </span> </a>
                    </li>

                    <li>
                        <a href="chat.html">
                            <i class="uil-location-arrow"></i>
                            <span> Xabarlar </span> <span class="nav-tag"> 3</span> </a>
                    </li>
                    <li>
                        <a href="trending.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                            <span> Trenddagilar </span> </a>
                    </li>
                    <li>
                        <a href="{{url("profile/admin/market")}}">
                            <i class="uil-store"></i>
                            <span> Do'kon </span> </a>
                    </li>
                    <li>
                        <a href="{{ url("profile/settings") }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span> Sozlamalar </span>
                        </a>

                    </li>
                    <li>
                        <a href="{{url("home")}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span> Profilim </span> </a>
                    </li>
                    <li>
                        <hr class="my-2">
                    </li>
                    <li>
                        <a href="#" onclick="logout()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span> Chiqish </span> </a>
                        <form style="display: none" id="logout" action="{{route('logout')}}" method="post">
                            @csrf
                            <input style="cursor: pointer;" type="submit" value="Log out">
                        </form>
                    </li>
                </ul>
            @endif
            <p style="padding: 20px 0px;">
                Baraka Shop - Turli xil mahsulotlarni o'z ichiga olgan ko'p tarmoqli internet do'kon bo'lib, bu yerda
                foydalanuvchilar uchun ko'plab imkoniyatlar hosil qilingan
            </p>

            <div style="font-size: 27px;text-align: center;">
                <a href="http://instagram.com/BarakaShop_uz"><ion-icon name="logo-instagram" role="img" class="md hydrated" aria-label="logo instagram"></ion-icon></a>
                <ion-icon name="logo-facebook" role="img" class="md hydrated" aria-label="logo facebook"></ion-icon>
                <a href="#"><ion-icon name="paper-plane-outline" role="img" class="md hydrated"
                          aria-label="paper plane outline"></ion-icon></a>
                <ion-icon name="mail-outline" role="img" class="md hydrated" aria-label="mail outline"></ion-icon>
            </div>
			<div class="mxmedia">
			Sayt tuzuvchi: <a href="https://mxmedia.uz" target="_blank" title="MXMEDIA">MXMEDIA</a>
			</div>
            <br>
            <br>
        </div>
    </div>
</div>

<script>
  function logout(){
      $("#logout").submit()
  }
</script>