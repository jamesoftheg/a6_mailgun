<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index() {
        $title = 'Lab 6 - Mailgun';
        // This is one way to pass parameters.
        // return view('pages.index', compact('title'));
        // This is a good way to pass in arrays.
        return view('pages.index')->with('title', $title);
    }
}
