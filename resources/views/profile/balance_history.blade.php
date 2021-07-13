@extends("layouts.app")
@section("content")

    <div class="container m-auto">

        @include("components.admin_menu")
        <br>
        <br>
        @if(count($payments) !== 0)
            <table class="uk-table  uk-table-divider">
                <thead>

                <tr>
                    <th>Karta raqami</th>
                    <th>Summa</th>
                    <th>Yaratilgan sana</th>
                    <th>Qabul qilingan sana</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                <tr style="background-color: @php if ($payment->status_one->id === \App\Models\Payment::PAYED) echo "aquamarine";  @endphp">
                    <td>{{FormatCreditCard($payment->card_number) }}</td>
                    <td>{{price_format($payment->amount)}}</td>
                    <td>{{ $payment->created_at }}</td>
                    <td>{{ ($payment->created_at !== $payment->updated_at) ? $payment->updated_at : "Hali qabul qilinmadi"}}</td>
                    <td>{{$payment->status_one->description}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
    @else
            <div uk-alert>
                <a class="uk-alert-close" ></a>
                <h3>Balans tarixi bo'sh</h3>

            </div>
    @endif


@endsection

