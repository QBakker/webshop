@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 my-5">
            <h1 class="text-center text-white">Winkelwagen:</h1>
        </div>
    </div>
    <div class="col-12">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Artikel</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Beschrijving</th>
                    <th scope="col">Hoeveelheid</th>
                    <th scope="col">Bedrag</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if( $items === [] )
                <tr>
                    <td colspan='5'>De winkelwagen is leeg</td>
                </tr>
                @endif
                @foreach ($items as $item)
                <tr class="custom-table">
                    <td class="table-img">
                        <img src="/img/product/{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                    </td>
                    <td class="w-25">{{ $item['product']->name }}</td>
                    <td class="w-25">{{ $item['product']->description }}</td>
                    <td class="w-25">
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="productID" value="{{ $item['product']->id }}">
                            <input class="d-block mb-2" type="number" name="amount" value="{{ $item['amount'] }}" min="0">
                            <button type="submit">Pas aan</button>
                        </form>
                    </td>
                    <td>{{ number_format($item['product']->price, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.destroy') }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="productID" value="{{ $item['product']->id }}">
                            <button type="submit">X</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ( $items != [] )
        <div class="row">
            <div class="col-10 text-white">
                <h6>Totaal: &euro; {{ number_format($total, 2, ',', '.') }}</h6>
            </div>
            <div class="col-2">
                <a href="{{ route('order.create') }}" class="btn btn-success text-decoration-none">Bestellen</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection