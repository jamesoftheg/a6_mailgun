<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Item::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        return (new OrdersShipped())->render();
    }

}
