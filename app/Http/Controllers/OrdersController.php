<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with(['client', 'project'])->get();
        return view('orders.index', compact('orders'));
    }

    // Show create form
    public function create()
    {
        $clients = Client::all();
        $projects = Project::all();
        return view('orders.create', compact('clients', 'projects'));
    }

    public function status(Order $order)
    {

        return view('orders.status', compact('order'));
    }

    // Store a new order
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);

        Client::create([
            'client_name' => $validatedData['client_name'],
            'email' => $validatedData['email'] ?? null,
            'phone_number' => $validatedData['phone_number'] ?? null,
            'status' => 'active', // Default status
        ]);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    // Show single order
    public function show(Order $order)
    {
        $order->load(['client', 'project']);
        return view('orders.show', compact('order'));
    }

    // Show edit form
    public function edit(Order $order)
    {
        $clients = Client::all();
        $projects = Project::all();
        return view('orders.edit', compact('order', 'clients', 'projects'));
    }

    // Update order
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|string|max:255',
            'due_date' => 'required|date'
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Optional: delete order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
