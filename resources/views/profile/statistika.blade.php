@extends("layouts.app")
@section("content")

    <div class="container m-auto">

        @include("components.admin_menu")
        <br>
        <br>
        @if(count($referals) !== 0)
            <table style="background-color: white;border-radius: 10px" class="uk-table  uk-table-divider">
                <thead>
                <tr >
                    <th>Oqim</th>
                    <th>Ko'rildi</th>
                    <th>Mijoz raqamini qoldirdi</th>
                    <th>Qabul qilindi</th>
                    <th>Yetkazilmoqda</th>
                    <th>Yetqazib berildi</th>
                    <th>Bekor qilindi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($referals as $referal)
                <tr>
                    <td>{{$referal['name']}}</td>
                    <td>{{$referal['view']}}</td>
                    <td>{{$referal['not_accepted']}}</td>
                    <td>{{$referal['not_saled']}}</td>
                    <td>{{$referal['deliving']}}</td>
                    <td>{{$referal['saled']}}</td>
                    <td>{{$referal['ignore']}}</td>
                </tr>
                @endforeach
                <tr style="background-color: #C73632;font-weight: bold;color: white;">
                    <td>Jami</td>
                    <td>{{$all['view']}}</td>
                    <td>{{$all['not_accepted']}}</td>
                    <td>{{$all['not_saled']}}</td>
                    <td>{{$all['deliving']}}</td>
                    <td>{{$all['saled']}}</td>
                    <td>{{$all['ignore']}}</td>
                </tr>
                </tbody>
            </table>
    @else
            <div uk-alert>
                <a class="uk-alert-close" ></a>
                <h3>Sizda statistika mavjud emas</h3>

            </div>
    @endif


@endsection

