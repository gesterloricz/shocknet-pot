@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Order Status Dashboard</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('orders.create') }}" class="btn btn-custom-primary">New Order</a>

        </div>
    </div>

    <!-- orders -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order</th>
                            <th>Client</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->client->client_name ?? 'N/A' }}</td>
                            <td>{{ $order->project_name ?? 'N/A' }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->delivery->delivery_date ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-custom-secondary">View</a>
                                <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-outline-custom-primary me-1">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No orders found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #ED1C24;
        --primary-color-hover: #A11219FF;
        --secondary-color: #050A30;
        --secondary-color-hover: #050A30;
        --color-light: #f8f9fa;
        --color-white: #ffffff;
    }

    .btn-custom-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: var(--color-white);
    }

    .btn-custom-primary:hover {
        background-color: var(--primary-color-hover);
        border-color: var(--primary-color-hover);
        color: var(--color-white);
    }

    .btn-outline-custom-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
        background-color: transparent;
    }

    .btn-outline-custom-primary:hover {
        background-color: var(--primary-color-hover);
        border-color: var(--primary-color-hover);
        color: var(--color-white);
    }

    .btn-custom-secondary {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--color-white);
    }

    .btn-outline-custom-secondary {
        color: var(--secondary-color);
        border-color: var(--secondary-color);
        background-color: transparent;
    }

    .btn-outline-custom-secondary:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--color-white);
    }

    .btn-outline-custom-success {
        color: var(--brand-success);
        border-color: var(--brand-success);
        background-color: transparent;
    }

    .btn-outline-custom-success:hover {
        background-color: var(--brand-success);
        border-color: var(--brand-success);
        color: var(--color-white);
    }

    .btn-outline-custom-info {
        color: var(--brand-info);
        border-color: var(--brand-info);
        background-color: transparent;
    }

    .btn-outline-custom-info:hover {
        background-color: var(--brand-info);
        border-color: var(--brand-info);
        color: var(--color-white);
    }

    .text-custom-primary {
        color: var(--secondary-color) !important;
    }

    .bg-custom-secondary {
        background-color: var(--primary-color) !important;
    }

    .border-custom-secondary {
        border-color: var(--secondary-color) !important;
    }

    .timeline-step {
        width: 30px;
        height: 30px;
    }

    .timeline-connector {
        border-color: var(--primary-color);
        border-width: 1px;
    }
</style>

@endsection