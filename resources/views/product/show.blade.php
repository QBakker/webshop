@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="jumbotron bg-secondary text-white">
                <h1 class="display-4 text-center">{{ $product->name }}</h2>
                    <div class="row">
                        <div class="col-6">
                            <img class="product-img" src="/img/product/{{ $product->image }}" alt="{{ $product->name }}">
                        </div>
                        <div class="col-5 ml-5">
                            <form method="POST" action="{{ route('cart.store') }}" class="form-inline">
                                @csrf

                                <input type="hidden" name="productID" value="{{ $product->id }}">

                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="d-inline">Aantal:</h3>
                                        <h3 class="d-block">Prijs:</h3>
                                    </div>
                                    <div class="col-6">
                                        <select name="amount" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>Maak een keuze</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <h3>€{{ $product->price }}</h3>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block mt-5">Kopen</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection