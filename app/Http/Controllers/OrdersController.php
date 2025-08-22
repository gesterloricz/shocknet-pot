<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Order;
use App\Models\OrderSpecification;
use App\Models\OrderFile;
use App\Models\OrderDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Show all orders (projects)
     */
    public function index()
    {

        $orders = Project::with(['client', 'delivery'])->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show create form (step 1)
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a new order (multi-step)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Step 1: Client + Project
            'client_name'       => 'required|string|max:255',
            'email'             => 'nullable|email|max:255',
            'phone_number'      => 'nullable|string|max:20',
            'project_name'      => 'required|string|max:255',

            // Step 2: Product Specification
            'product_type'      => 'required|string',
            'quantity'          => 'required|integer|min:1',
            'printing_method'   => 'required|string',
            'size'              => 'required|string',
            'paper_type'        => 'required|string',
            'paper_weight'      => 'required|string',
            'color_spec'        => 'required|string',
            'finishing_option'  => 'nullable|string',
            'binding_type'      => 'nullable|string',
            'lamination_type'   => 'nullable|string',

            // Step 3: Files
            'artwork_file.*'    => 'file|mimes:pdf,jpg,png,ai,psd|max:10240',
            'file_status'       => 'nullable|string',

            // Step 4: Delivery Info
            'delivery_address'  => 'required|string|max:500',
            'delivery_date'     => 'required|date',
            'delivery_method'   => 'required|string',
            'priority_level'    => 'nullable|string',
            'packaging_requirements' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $validated) {
            // create client
            $client = Client::create([
                'client_name'  => $validated['client_name'],
                'email'        => $validated['email'] ?? null,
                'phone_number' => $validated['phone_number'] ?? null,
                'status'       => 'active',
            ]);

            // create project
            $project = Project::create([
                'client_id'    => $client->id,
                'project_name' => $validated['project_name'],
                'status'       => 'in-progress',
            ]);

            // product specification
            OrderSpecification::create([
                'project_id'       => $project->id,
                'product_type'     => $validated['product_type'],
                'quantity'         => $validated['quantity'],
                'printing_method'  => $validated['printing_method'],
                'size'             => $validated['size'],
                'paper_type'       => $validated['paper_type'],
                'paper_weight'     => $validated['paper_weight'],
                'color_spec'       => $validated['color_spec'],
                'finishing_option' => $validated['finishing_option'] ?? null,
                'binding_type'     => $validated['binding_type'] ?? null,
                'lamination_type'  => $validated['lamination_type'] ?? null,
            ]);

            // files
            if ($request->hasFile('artwork_file')) {
                foreach ($request->file('artwork_file') as $file) {
                    $path = $file->store('order_files');

                    OrderFile::create([
                        'project_id' => $project->id,
                        'file_path'  => $path,
                        'status'     => $validated['file_status'] ?? null,
                    ]);
                }
            }

            // delivery
            OrderDelivery::create([
                'project_id'           => $project->id,
                'delivery_address'     => $validated['delivery_address'],
                'delivery_date'        => $validated['delivery_date'],
                'delivery_method'      => $validated['delivery_method'],
                'priority_level'       => $validated['priority_level'] ?? null,
                'packaging_requirements' => $validated['packaging_requirements'] ?? null,
            ]);
        });

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    /**
     * Show single order (project with details)
     */
    public function show(Project $project)
    {
        $project->load(['client', 'specification', 'files', 'delivery']);
        return view('orders.show', compact('project'));
    }

    /**
     * Edit order (basic example)
     */
    public function edit(Project $project)
    {
        $project->load(['specification', 'delivery']);
        return view('orders.edit', ['order' => $project]);
    }

    /**
     * Update order
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'status'       => 'required|string|max:255',
        ]);

        $project->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Delete order
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
