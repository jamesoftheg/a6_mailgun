<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrdersShipped;
Use Illuminate\Support\Facades\Mail;

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

        $item = Item::find($id);

        $cart = session()->get("cart");

        if ($cart === null) {
            $cart = [];
        }

        $item_name = Item::select('*')->where('id', $id)->value('name');
        $item_price = Item::select('*')->where('id', $id)->value('price');
        $item_quantity = $request->quantity;

        $added = false;

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

    public function cart() {
        return view('items.cart');
    }

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

        $receipt = new OrdersShipped($fname, $lname);

        Mail::to('gelfandjames@gmail.com')
        ->send($receipt);

        return $receipt->render();
    }

}
