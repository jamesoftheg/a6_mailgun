<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrdersShipped;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $credit_card = $request->credit_card;
        $expiry = $request->expiry;
        $email = $request->email;

        $fname = $request->session()->put("first_name", $first_name);
        $lname = $request->session()->put("last_name", $last_name);
        $card = $request->session()->put("card", $credit_card);
        $expiration = $request->session()->put("expiration", $expiry);
        $user_email = $request->session()->put("email", $email);

        return (new OrdersShipped())->render();
    }
}
