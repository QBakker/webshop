@extends('layouts.app')

@section('content')
<div class="container text-white">

    <div class="row justify-content-center">
        <div class="col-12 my-5">
            <h1 class="text-center">Gegevens:</h1>
        </div>
        <div class="col">
            <h3 class="text-center">Winkelwagen</h3>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Artikel</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Hoeveelheid</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr class="custom-table">
                        <td class="table-img">
                            <img src="/img/product/{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                        </td>
                        <td class="w-25">{{ $item['product']->name }}</td>
                        <td class="w-25">{{ $item['amount'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <form action="{{ route('order.store') }}" method="post">
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Straat</span>
                    </div>
                    <input name="address" type="text" class="form-control" placeholder="Planetenlaan.." aria-label="street" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Huisnummer</span>
                    </div>
                    <input name="housenumber" type="number" class="form-control" placeholder="123.." aria-label="house-number" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Postcode</span>
                    </div>
                    <input name="zipcode" type="text" class="form-control" placeholder="3312PF" aria-label="zipcode" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Woonplaats</span>
                    </div>
                    <input name="residence" type="text" class="form-control" placeholder="Amsterdam" aria-label="city" aria-describedby="addon-wrapping">
                </div>

                <button class="btn btn-outline-primary" type="submit">Ga verder</button>
            </form>
        </div>
    </div>
</div>
@endsection