@extends ('layouts.app')

@section ('content')
<div class="container text-white">
    <div class="row">
        <div class="col-12 my-5">
            <h1 class="text-center">Bestelling:</h1>
        </div>

        <div>
            <h5>Adres: {{ $order->address }} {{ $order->housenumber }}</h5>
            <h5>Postcode: {{ $order->zipcode }}</h5>
            <h5>Woonplaats: {{ $order->residence }}</h5>
        </div>

        <table class="table table-striped table-dark justify-content-center">
            <thead>
                <tr>
                    <th scope="col">Artikel</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Hoeveelheid</th>
                    <th scope="col">Prijs</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $item)
                <tr class="custom-table">
                    <td class="table-img">
                        <img src="/img/product/{{ $item->image }}" alt="{{ $item->name }}">
                    </td>
                    <td class="w-25">{{ $item->name }}</td>
                    <td class="w-25">{{ $item->pivot->amount }}</td>
                    <td class="w-25">{{ $item->total_price }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <div class="row justify-content-end">
        <div class="col-1 text-white">
            <h6>Totaal: &euro; {{ number_format($order->total_price, 2, ',', '.') }}</h6>
        </div>
    </div>
</div>
</div>
@endsection