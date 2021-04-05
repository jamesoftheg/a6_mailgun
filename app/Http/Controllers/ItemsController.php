<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrdersShipped;
Use Illuminate\Support\Facades\Mail;

/**
 * "StAuth10065: I James Gelfand, 000275852 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement. 
 * I have not made my work available to anyone else."
 */

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index')->with('items', $items);
    }

    public function add(Request $request, $id) {

        // Validate form entry
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return redirect('items')
                ->withErrors($validator)
                ->withInput();
        } else {
            $item = Item::find($id);

            $cart = session()->get("cart");

            if ($cart === null) {
                $cart = [];
            }

            // Retrieve item information from database
            $item_name = Item::select('*')->where('id', $id)->value('name');
            $item_price = Item::select('*')->where('id', $id)->value('price');
            $item_quantity = $request->quantity;

            $added = false;

            // Calculate the total cost, add to session variable.
            $totalcost = session()->get("totalcost");
            $totalcost += $item_price * $item_quantity;
            
            session(
                ['totalcost' => $totalcost]
            );

            // Create item within array
            foreach($cart as &$item) {
                if($item['name'] === $item_name) {
                    $item['quantity'] += $item_quantity;
                    $added = true;
                }
            }

            if($added === false) {
                array_push($cart, [
                    'name' => $item_name,
                    'price' => $item_price,
                    'quantity' => $item_quantity
                ]);
            }

            session(
                ['cart' => $cart]
            );

            return redirect()->back()->with('success', 'Item added to cart successfully!');
        }
    }

    /**
     * View cart
     */
    public function cart() {
        return view('items.cart');
    }

    /**
     * Checkout, retrieves information from form and generates email
     */
    public function checkout(Request $request) {

        // Validate form entry
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'credit_card' => 'required|numeric',
            'expiry' => 'required',
            'email' => 'required|email:rfc,dns',
        ]);

        if ($validator->fails()) {
            return redirect('cart')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create session variable and store user info
            $userinfo = session()->get("userinfo");
            $userinfo = [];

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $credit_card = $request->credit_card;
            $expiry = $request->expiry;
            $email = $request->email;

            array_push($userinfo, [
                'firstname' => $first_name,
                'lastname' => $last_name,
                'creditcard' => $credit_card,
                'expiry' => $expiry,
                'email' => $email
            ]);

            session(
                ['userinfo' => $userinfo]
            );

            // Create receipt
            $receipt = new OrdersShipped();

            Mail::to($email)
            ->send($receipt);

            return $receipt->render();
        }
    }

}
