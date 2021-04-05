<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $credit_card = $request->credit_card;
        $expiry = $request->expiry;
        $email = $request->email;

        $fname = session()->put("first_name", $first_name);
        $lname = session()->put("last_name", $last_name);
        $card = session()->put("card", $credit_card);
        $expiration = session()->put("expiration", $expiry);
        $user_email = session()->put("email", $email);

        return view('emails.orders.shipped');
    }
}
