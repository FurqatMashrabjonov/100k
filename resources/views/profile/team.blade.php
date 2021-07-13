@extends('layouts.app')

@section('content')

    <div class="container m-auto">

        @include("components.admin_menu")
        <br><br><br>
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">

            <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close"></a>
                <p style="color: cornflowerblue"><strong>Mening referal linkim:</strong>   {{$team_url}}
                </p>

            </div>
            <br><br>
        </div>
        <div>
            <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">
                @if(count($my_teams) !== 0)
                    <table class="uk-table  uk-table-divider">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>FIO</th>
                            <th>Telefon raqami</th>
                            <th>Sana</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($my_teams as $my_team)
                            <tr>
                                <td>{{$my_team->id}}</td>
                                <td>{{$my_team->user->full_name}}</td>
                                <td>{{phone_format($my_team->user->phone) }}</td>
                                <td>{{$my_team->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div uk-alert>
                        <a class="uk-alert-close" ></a>
                        <h3>Sizda jamoa a'zolari mavjud emas</h3>

                    </div>
                @endif
            </div>
        </div>
    </div>


    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset("assets/js/jquery.mask.js")}}"></script>

    <script>
        $("#card_number1").focusout(function () {
            $("#card_number").val($("#card_number1").val().match(/\d/g).join(""))
        })

        $("#card_number1").mask("0000 0000 0000 0000");
    </script>
@endsection

