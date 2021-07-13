@extends("layouts.app")

@section("content")

    <div class="container m-auto">

        @include("components.admin_menu")
        <div class="uk-child-width-1-3@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" uk-grid>
            @if(count($referals) !== 0)
                @foreach($referals as $referal)
                    <div>
                        <div class="uk-card uk-card-default uk-card-body" style="margin-top: 3em; padding: 20px !important; border-radius: 15px">

                            <p>{{(isset($referal->name) ? $referal->name : 'No name')}}</p>
							   <a href="{{url("profile/admin/referals/delete/" . $referal->id)}}"
                                   class="delete_ref2 uk-button-danger">
                                    <ion-icon style="position:relative;top:-1px;" name="trash-outline" ></ion-icon></a>
                            <div class="flex" style="justify-content: start; align-items: center;">
                            <p style="font-weight: 900;"> {{$referal->view}}</p>
                                <img src="{{asset("icons/view.png")}}" alt="" width="20px" style="margin-left: 5px">
                            </div>
                          
                            <div class="flex" style="justify-content: space-between; align-items: center;">
                             
								
								
								
								
								   <div class="card-body">
                            
                           
                            <div style="padding-top: 10px;" class="form-group">
                                <input type="text" value="{{referalUrlMaker($referal->token)}}" readonly="" class="ref_link form-control">
                            </div>
                        
                            
                            <hr>
                            
                            <button style="width:100%;    margin-bottom: 10px;
    margin-top: 10px;" class="copy_ref_bn btn btn-primary uk-button uk-button-primary copy_button"><ion-icon style="position:relative;top:2px;" name="copy-outline"></ion-icon> Nusxa olish</button><br>
							   <a href="https://xn--r1a.link/share/url?url={{referalUrlMaker($referal->token)}}"
                                   class="delete_ref uk-button-danger" style="display: flex; justify-content: center;background:#1e87f0; align-items: center; padding: 5px; border-radius: 5px">
                                    <ion-icon style="position:relative;top:-1px;" name="paper-plane-outline" ></ion-icon> Telegramda ulashish</a>
                        </div>
								
							
								
								
								
								
                             
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div uk-alert>
                    <a class="uk-alert-close"></a>
                    <h3>Sizda oqimlar mavjud emas</h3>
                    <p>Oqim yaratish uchun <a href="{{url("profile/admin/market")}}" style="color: #0e6dcd">ushbu</a>
                        havola orqali oqimlar
                        bo'limiga o'ting!</p>
                </div>
            @endif
        </div>

        <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
      

        
    </div>

        
        
        
        
        


        
<script>
$(".card-body .copy_ref_bn").on('click', function() {
    var copyText = $(this).parent().find('.ref_link').get(0);
    
    copyText.select();
    document.execCommand("copy");
    $(this).text('✓ Nusxa olindi');
});
</script>        
        

@endsection
