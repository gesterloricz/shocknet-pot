<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function show($id)
    {
        return view('clients.show', compact('id'));
    }

    public function edit($id)
    {
        return view('clients.edit', compact('id'));
    }
}
