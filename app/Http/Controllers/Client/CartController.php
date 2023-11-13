<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkout(Request $request){

        return view('client.pages.checkout');
    }
}
