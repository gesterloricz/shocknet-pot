@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Order Status Dashboard</h2>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-custom-secondary me-2">Search</button>
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-custom-secondary">View</a>
                                <a href="#" class="btn btn-sm btn-outline-custom-primary me-1">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-custom-secondary">View</a>
                                <a href="#" class="btn btn-sm btn-outline-custom-primary me-1">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-custom-secondary">View</a>
                                <a href="#" class="btn btn-sm btn-outline-custom-primary me-1">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-custom-secondary">View</a>
                                <a href="#" class="btn btn-sm btn-outline-custom-primary me-1">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-custom-secondary">View</a>
                                <a href="#" class="btn btn-sm btn-outline-custom-primary me-1">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- details -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title text-custom-primary">Order #2025-002 - Shocknet Timeline Details</h5>

            <!-- timeline -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>1</small>
                            </div>
                            <div class="small mt-1">Client Briefing</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>2</small>
                            </div>
                            <div class="small mt-1">Pre-press</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>3</small>
                            </div>
                            <div class="small mt-1">Printing</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>4</small>
                            </div>
                            <div class="small mt-1">Post-press</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>5</small>
                            </div>
                            <div class="small mt-1">Packaging</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>6</small>
                            </div>
                            <div class="small mt-1">Delivery</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- status -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <strong>Current Status:</strong> ?? ???????? ? ????????? ?????
                </div>
                <div class="col-md-4">
                    <strong>Estimated Completion:</strong> ???? ??? ????
                </div>
                <div class="col-md-4">
                    <strong>Next Stage:</strong> ???????? ?????
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-custom-primary me-2">Update Status</button>
                <button class="btn btn-outline-custom-secondary me-2">Add Note</button>
                <button class="btn btn-outline-custom-secondary me-2">Contact Client</button>
                <button class="btn btn-outline-custom-secondary me-2">Generate Report</button>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --brand-primary: #ED1C24;
        --brand-primary-hover: #A11219FF;
        --brand-secondary: #050A30;
        --brand-secondary-hover: #050A30;
        --brand-light: #f8f9fa;
        --brand-white: #ffffff;
    }

    .btn-custom-primary {
        background-color: var(--brand-primary);
        border-color: var(--brand-primary);
        color: var(--brand-white);
    }

    .btn-custom-primary:hover {
        background-color: var(--brand-primary-hover);
        border-color: var(--brand-primary-hover);
        color: var(--brand-white);
    }

    .btn-outline-custom-primary {
        color: var(--brand-primary);
        border-color: var(--brand-primary);
        background-color: transparent;
    }

    .btn-outline-custom-primary:hover {
        background-color: var(--brand-primary-hover);
        border-color: var(--brand-primary-hover);
        color: var(--brand-white);
    }

    .btn-custom-secondary {
        background-color: var(--brand-secondary);
        border-color: var(--brand-secondary);
        color: var(--brand-white);
    }

    .btn-outline-custom-secondary {
        color: var(--brand-secondary);
        border-color: var(--brand-secondary);
        background-color: transparent;
    }

    .btn-outline-custom-secondary:hover {
        background-color: var(--brand-secondary);
        border-color: var(--brand-secondary);
        color: var(--brand-white);
    }

    .btn-outline-custom-success {
        color: var(--brand-success);
        border-color: var(--brand-success);
        background-color: transparent;
    }

    .btn-outline-custom-success:hover {
        background-color: var(--brand-success);
        border-color: var(--brand-success);
        color: var(--brand-white);
    }

    .btn-outline-custom-info {
        color: var(--brand-info);
        border-color: var(--brand-info);
        background-color: transparent;
    }

    .btn-outline-custom-info:hover {
        background-color: var(--brand-info);
        border-color: var(--brand-info);
        color: var(--brand-white);
    }

    .text-custom-primary {
        color: var(--brand-secondary) !important;
    }

    .bg-custom-secondary {
        background-color: var(--brand-primary) !important;
    }

    .border-custom-secondary {
        border-color: var(--brand-secondary) !important;
    }

    .timeline-step {
        width: 30px;
        height: 30px;
    }

    .timeline-connector {
        border-color: var(--brand-primary);
        border-width: 1px;
    }
</style>

@endsection