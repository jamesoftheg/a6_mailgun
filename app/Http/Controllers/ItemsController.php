<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{

    public function index() {
        $title = 'Lab 6 - Mailgun';
        $item1 = new Item();
        $item1->name = 'Carrot';
        $item1->description = 'An orange vegetable';
        $item1->cost = .99;
        $items = array($item1);
        // This is one way to pass parameters.
        // return view('pages.index', compact('title'));
        // This is a good way to pass in arrays.
        return view('items.index')->with('items', $items);
    }
}
