@extends ('layouts.app')

@section ('content')
<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-12 my-5">
            <h1 class="text-center">Bestellingen:</h1>
        </div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Bestelling</th>
                    <th scope="col">besteld op</th>
                    <th scope="col">totaal bedrag</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="custom-table">
                    <td class="w-25">{{ $order->id }}</td>
                    <td class="w-25">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="w-25">Totaal: &euro; {{ number_format($order->total_price, 2, ',', '.') }}</td>
                    <td class="w-25"><a class="btn btn-outline-info" href="{{ route('order.show', [$order->id]) }}">Bekijk</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection