@extends("layouts.app")
@section("content")

    <div class="container m-auto">

        @include("components.admin_menu")
        <br>
        <br>
        @if(count($requests) !== 0)
            <table style="background-color: white;border-radius: 10px" class="uk-table  uk-table-divider">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Mahsulot</th>
                    <th>Buyurtmachi/Manzil</th>
                    <th>Holat</th>
                    <th>Izoh</th>
                    <th>Sana</th>
                    <th>Oqim</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                <tr>
                    <td>
                    Operator: {{$request->admin->id}}
                    </td>
                    <td>{{$request->checkout->product->name}}</td>
                    <td>{{$request->checkout->name}} - {{phone_hidden($request->checkout->phone)}} - {{$request->checkout->address}}</td>
                    <td>{{ ($request->checkout->with_status->id === \App\Models\Checkout::IGNORE) ? $request->checkout->with_status->description . '(' . $request->checkout->reason->description . ')' : $request->checkout->with_status->description }}</td>
                    <td>{{$request->description}}</td>
                    <td>{{$request->created_at}}</td>
                    <td>{{$request->checkout->referal->name}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
    @else
            <div uk-alert>
                <a class="uk-alert-close" ></a>
                <h3>Sizda So'rovlar mavjud emas</h3>

            </div>
    @endif


@endsection

