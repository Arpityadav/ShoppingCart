@extends('layouts.master')

@section('content')

<div class="col-lg-8 mx-auto mt-5">
    @if(!request()->session()->has('cart'))
    <h1>Your Cart is empty.</h1>
    @else
    <ul class="list-group">
        @foreach($products->items as $product)

        <li class="list-group-item list-group-item-light">
            {{ $product['item']['title'] }}
            <span>| ${{ $product['price'] }}</span>
            <span class="dropdown show">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/remove/{{ $product['item']['id'] }}">Reduce all</a>
                    <a class="dropdown-item" href="/reduce/{{ $product['item']['id'] }}">Reduce by 1</a>
                </div>
            </span>
            <span class="badge badge-secondary float-right">{{ $product['quantity'] }}</span>
        </li>


        @endforeach
    </ul>

    <h4 class="mt-3 text-muted">Total Price: {{ $products->totalCost }}</h4>

    @if(auth()->check())

        <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Checkout</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <h3 class="mx-auto mt-2">Enter your shipping information here:</h3>

                    <form action="/checkout" method="post" class="mx-5 my-2">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Name of Reciever</label>
                                <input name="recieverName" type="text" class="form-control" id="name">
                            </div>

                            <div class="form-group">
                                <label for="address">Address of Reciever</label>
                                <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                            </div>

                          <script
                          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                          data-key="{{ config('services.stripe.key') }}"
                          data-amount="{{ $totalCostInCent }}"
                          data-name="Shopping Cart With Laravel"
                          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                          data-locale="auto"
                          data-zip-code="true">
                        </script>
                     </form>
                </div>
            </div>
        </div>
        @else
            <p><a href="{{ route('login') }}">Sign in</a> to purchase the product</p>
        @endif
@endif
</div>
@endsection

