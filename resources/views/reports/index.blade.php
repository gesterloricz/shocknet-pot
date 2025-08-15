@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Reports Dashboard Header -->
    <div class="bg-white rounded shadow-sm p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold text-dark">Reports Dashboard</h2>
            <button type="button" class="btn btn-custom-primary px-4">
                Download All
            </button>
        </div>
    </div>

    <!-- Report Generation Cards -->
    <div class="row mb-4">
        <!-- Monthly Summary Card -->
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm p-4 h-100">
                <h5 class="mb-4 fw-semibold text-dark">Monthly Summary</h5>
                <div class="d-grid">
                    <a href="#" class="btn btn-sm btn-custom-secondary px-4">Generate</a>
                </div>
            </div>
        </div>

        <!-- Client Report Card -->
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm p-4 h-100">
                <h5 class="mb-4 fw-semibold text-dark">Client Report</h5>
                <div class="d-grid">
                    <a href="#" class="btn btn-sm btn-custom-secondary px-4">Generate</a>
                </div>
            </div>
        </div>

        <!-- Project Report Card -->
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm p-4 h-100">
                <h5 class="mb-4 fw-semibold text-dark">Project Report</h5>
                <div class="d-grid">
                    <a href="#" class="btn btn-sm btn-custom-secondary px-4">Generate</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Reports Table -->
    <div class="bg-white rounded shadow-sm p-4">
        <h5 class="mb-4 fw-semibold text-dark">Recent Reports</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="fw-semibold text-dark">Report Name</th>
                        <th scope="col" class="fw-semibold text-dark">Type</th>
                        <th scope="col" class="fw-semibold text-dark">Date</th>
                        <th scope="col" class="fw-semibold text-dark">Status</th>
                        <th scope="col" class="fw-semibold text-dark">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-medium">Monthly Summary - June 2025</td>
                        <td>Monthly</td>
                        <td>July 1, 2025</td>
                        <td>
                            <span class="badge bg-success rounded-pill px-3 py-2">Ready</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-sm btn-outline-custom-secondary px-3">Download</a>
                                <a href="#" class="btn btn-sm btn-outline-custom-primary px-3">Edit</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Client Activity Report</td>
                        <td>Monthly</td>
                        <td>July 1, 2025</td>
                        <td>
                            <span class="badge bg-success rounded-pill px-3 py-2">Ready</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-sm btn-outline-custom-secondary px-3">Download</a>
                                <a href="#" class="btn btn-sm btn-outline-custom-primary px-3">Edit</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #ED1C24;
        --primary-color-hover: #A11219FF;
        --secondary-color: #050A30;
        --light-color: #f8f9fa;
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

    .btn-custom-secondary:hover {
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

    .btn:hover {
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .badge {
        font-size: 0.75rem;
        font-weight: 500;
    }

    .card {
        transition: all 0.2s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
    }
</style>
@endsection