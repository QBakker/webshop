@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-12 my-5">
            <h1 class="text-center text-white">Categorieën:</h1>
        </div>
        @foreach($categories as $category)
        <div class="col-4 mb-4">
            <a class="card custom-card bg-secondary text-decoration-none" href="{{ route('category.show', $category->id) }}">
                <h2 class="card-header text-center text-dark">{{ $category->name }}</h2>
                <img src="/img/{{ $category->image }}" alt="{{ $category->name }}">
                <div class="card-body text-white">
                    <p class="card-text">{{ $category->description }}</p>
                </div>
                <div href="#" class="btn btn-success text-decoration-none mb-3 w-75 mx-auto">Bekijk</div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection