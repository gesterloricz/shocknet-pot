<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function show($id)
    {
        return view('orders.show', compact('id'));
    }

    public function edit($id)
    {
        return view('orders.edit', compact('id'));
    }
}
