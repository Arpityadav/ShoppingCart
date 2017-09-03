@extends('layouts.master')


@section('content')
    <div class="row mt-5">
        @foreach ($products as $product)

             <div class="card col-lg-3 mx-auto mx-4 mt-4 border-0">

                <img class="card-img-top mx-auto" style="max-width: 200px; max-height: 200;" src="{{ $product->imagePath }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$product->title}}</h4>
                    <p class="card-text text-muted">{{ $product->description }}</p>

                    <span class="text-dark mr-auto">{{ $product->price }}</span>
                    <a href="/add-to-cart/{{ $product->id }}"><button type="button" class="btn btn-info float-right">Add to cart</button></a>
                </div>
            </div>

        @endforeach
    </div>


    <footer style="position: relative; bottom: 0;" class="blockquote-footer mt-3">
        <p style="text-align: center; " class="mx-auto">made with <i style="color: #ff3860" class="fa fa-heart"></i> by <a href="#">arp17</a></p>
    </footer>

@endsection
