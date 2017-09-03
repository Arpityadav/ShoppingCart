<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'profile'] ]);
    }


    public function create()
    {
        return view('users.signup');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:50|confirmed',
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        auth()->login($user);

        return redirect()->route('home');
    }

    public function getSignIn()
    {
        return view('users.signin');
    }

    public function postSignIn()
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        return redirect()->route('home');
    }

    public function profile()
    {
        if ($orders = auth()->user()->orders) {
            $orders->transform(function ($order, $key) {
                $order->cart = unserialize($order->cart);

                return $order;
            });
            return view('users.profile', compact('orders'));
        } else {
            return 'No orders bro';
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
