<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['checkout']);
    }

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function addToCart(Product $product)
    {
        $oldCart = request()->session()->has('cart') ? request()->session()->get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product);

        request()->session()->put('cart', $cart);

        return redirect()->route('home');
    }

    public function reduceByOne($id)
    {
        $oldCart = request()->session()->has('cart') ? request()->session()->get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            request()->session()->put('cart', $cart);
        } else {
            request()->session()->forget('cart');
        }
        return back();
    }

    public function removeItem($id)
    {
        $oldCart = request()->session()->has('cart') ? request()->session()->get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            request()->session()->put('cart', $cart);
        } else {
            request()->session()->forget('cart');
        }
        return back();
    }

    public function cartIndex()
    {
        $products = request()->session()->get('cart');
        if ($products) {
            $totalCostInCent = $products->totalCost * 100;
        }

        return view('carts.index', compact('products', 'totalCostInCent'));
    }

    public function checkout()
    {
        if (request()->session()->has('cart')) {
            Stripe::setApiKey(config('services.stripe.secret'));


            $customer = Customer::create([
                'email' => request('stripeEmail'),
                'source' => request('stripeToken'),
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $this->cartIndex()->totalCostInCent,
                'currency' => 'usd'
            ]);

            $this->validate(request(), [
                'recieverName' => 'required|min:2|max:50',
                'address' => 'required|max:200:min:5'
            ]);

            Order::create([
                'recieverName' => request('recieverName'),
                'address' => request('address'),
                'user_id' => auth()->id(),
                'cart' => serialize(request()->session()->get('cart')),
                'payment_id' => $charge->id,
            ]);


            request()->session()->forget('cart');
            session()->flash('message', 'Items have been purchased');

            return redirect()->route('home');
        } else {
            return 'Not found';
        }
    }
}
