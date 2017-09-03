@extends('layouts.master')

@section('content')
    <h1>welcome, {{ auth()->user()->name }}</h1>
    @foreach($orders as $order)
        <div class="card" style="width: 20rem;">
                <ul class="list-group list-group-flush">
                    @foreach($order->cart->items as $item)
                        <li class="list-group-item">
                                <span class="badge badge-default">{{ $item['price'] }}</span>

                                {{ $item['item']['title'] }} | {{ $item['quantity'] }} Unit(s)
                        </li>
                    @endforeach
                </ul>
            </div>

        <h4>total price {{ $order->cart->totalCost }}</h4>
        @endforeach

@endsection
