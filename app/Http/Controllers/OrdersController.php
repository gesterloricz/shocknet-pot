<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\OrderSpecification;
use App\Models\OrderFile;
use App\Models\OrderDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Project::with(['client', 'delivery'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Client + Project
            'client_name'       => 'required|string|max:255',
            'email'             => 'nullable|email|max:255',
            'phone_number'      => 'nullable|string|max:20',
            'project_name'      => 'required|string|max:255',

            // Product Specification
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

            // Files
            'artwork_file.*'    => 'file|mimes:pdf,jpg,png,ai,psd|max:10240',
            'file_status'       => 'nullable|string',

            // Delivery Info
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
                'status'       => 'Pre-press',
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

    public function show(Project $project)
    {
        $project->load(['client', 'specification', 'files', 'delivery']);
        return view('orders.show', compact('project'));
    }

    public function edit(Project $project)
    {
        // Load all related data needed for the edit form
        $project->load(['client', 'specification', 'delivery', 'files']);
        
        // Calculate next stage for the timeline
        $statuses = ['Pre-press', 'Printing', 'Post-press', 'Packaging', 'Complete'];
        $currentIndex = array_search($project->status, $statuses);
        $nextStage = isset($statuses[$currentIndex + 1]) ? $statuses[$currentIndex + 1] : 'Complete';
        
        return view('orders.edit', compact('project', 'nextStage'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            // Project fields
            'status'          => 'required|in:pre-press,printing,post-press,packaging,complete',
            'priority'        => 'nullable|in:normal,high,urgent',
            'delivery_date'   => 'nullable|date',
            'production_time' => 'nullable|string|max:255',
            'notes'           => 'nullable|string',
            
            // Product specification fields
            'product_type'      => 'nullable|string',
            'quantity'          => 'nullable|integer|min:1',
            'printing_method'   => 'nullable|string',
            'size'              => 'nullable|string',
            'paper_type'        => 'nullable|string',
            'paper_weight'      => 'nullable|string',
            'color_spec'        => 'nullable|string',
            
            // Delivery fields
            'delivery_address'  => 'nullable|string|max:500',
            'delivery_method'   => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated, $project) {
            // Update project
            $project->update([
                'status' => $validated['status'],
            ]);

            // Update specification if exists
            if ($project->specification) {
                $specificationData = array_filter([
                    'product_type' => $validated['product_type'] ?? null,
                    'quantity' => $validated['quantity'] ?? null,
                    'printing_method' => $validated['printing_method'] ?? null,
                    'size' => $validated['size'] ?? null,
                    'paper_type' => $validated['paper_type'] ?? null,
                    'paper_weight' => $validated['paper_weight'] ?? null,
                    'color_spec' => $validated['color_spec'] ?? null,
                ]);
                
                if (!empty($specificationData)) {
                    $project->specification->update($specificationData);
                }
            }

            // Update delivery if exists
            if ($project->delivery) {
                $deliveryData = array_filter([
                    'priority_level' => $validated['priority'] ?? null,
                    'delivery_date' => $validated['delivery_date'] ?? null,
                    'production_time' => $validated['production_time'] ?? null,
                    'delivery_address' => $validated['delivery_address'] ?? null,
                    'delivery_method' => $validated['delivery_method'] ?? null,
                ]);
                
                if (!empty($deliveryData)) {
                    $project->delivery->update($deliveryData);
                }
            }
        });

        return redirect()
            ->route('orders.show', $project->id)
            ->with('success', 'Project details updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    public function updateStatus(Project $project)
    {
        if ($project->status === 'Complete') {
            return back()->with('error', 'Project is already completed.');
        }

        $userRole = Auth::check() ? Auth::user()->role : null;

        $allowed = [
            'printing'  => 'Pre-press',
            'postpress' => 'Printing',
            'packaging' => 'Post-press',
        ];

        $statuses = ['Pre-press', 'Printing', 'Post-press', 'Packaging', 'Complete'];
        $currentIndex = array_search($project->status, $statuses);

        if (isset($allowed[$userRole]) && $project->status === $allowed[$userRole]) {
            $nextStatus = $statuses[$currentIndex + 1] ?? null;

            if ($nextStatus) {
                $project->update(['status' => $nextStatus]);
                return back()->with('success', "Project moved to $nextStatus stage.");
            }
        }

        return back()->with('error', 'You are not authorized to update this status.');
    }
}