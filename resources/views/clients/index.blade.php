@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <h2 class="display-4 fw-bold text-primary mb-2">0</h2>
                    <p class="text-muted mb-0">Total Clients</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <h2 class="display-4 fw-bold text-primary mb-2">0</h2>
                    <p class="text-muted mb-0">Active Projects</p>
                </div>
            </div>
        </div>
    </div>

    <!-- dashboard -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-custom-primary mb-0">Client Dashboard</h3>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-custom-secondary">
                        Export
                    </button>
                    <button type="button" class="btn btn-custom-primary">
                        <i class="fas fa-plus me-1"></i>New Client
                    </button>
                </div>
            </div>

            <!-- search Bar -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0"
                            placeholder="Search clients by name, email or company"
                            id="clientSearch">
                    </div>
                </div>
            </div>

            <!-- clients table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Client ID</th>
                            <th scope="col">Client</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Active Projects</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-medium">1</td>
                            <td>ABC Marketing</td>
                            <td>test@example.com</td>
                            <td>+639201238213</td>
                            <td>
                                <span class="badge bg-success rounded-pill px-3 py-2">Active</span>
                            </td>
                            <td class="text-center">0</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-outline-custom-secondary btn-sm" title="View">
                                        View
                                    </button>
                                    <a href="{{ route('clients.edit', 1) }}" class="btn btn-outline-custom-primary btn-sm" title="Edit">
                                        Edit
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-medium">2</td>
                            <td>ABC Marketing</td>
                            <td>test@example.com</td>
                            <td>+639201238213</td>
                            <td>
                                <span class="badge bg-danger rounded-pill px-3 py-2">Inactive</span>
                            </td>
                            <td class="text-center">0</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-outline-custom-secondary btn-sm" title="View">
                                        View
                                    </button>
                                    <button class="btn btn-outline-custom-primary btn-sm" title="Edit">
                                        Edit
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-medium">3</td>
                            <td>ABC Marketing</td>
                            <td>test@example.com</td>
                            <td>+639201238213</td>
                            <td>
                                <span class="badge bg-success rounded-pill px-3 py-2">Active</span>
                            </td>
                            <td class="text-center">0</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-outline-custom-secondary btn-sm" title="View">
                                        View
                                    </button>
                                    <button class="btn btn-outline-custom-primary btn-sm" title="Edit">
                                        Edit
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-medium">4</td>
                            <td>ABC Marketing</td>
                            <td>test@example.com</td>
                            <td>+639201238213</td>
                            <td>
                                <span class="badge bg-success rounded-pill px-3 py-2">Active</span>
                            </td>
                            <td class="text-center">0</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-outline-custom-secondary btn-sm" title="View">
                                        View
                                    </button>
                                    <button class="btn btn-outline-custom-primary btn-sm" title="Edit">
                                        Edit
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing 1 to 4 of 156 entries
                </div>
                <nav aria-label="Client pagination">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item-hover">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link text-custom-primary:hover" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-custom-primary" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-custom-primary" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-custom-primary" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
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

    /* Custom Button Styles */
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

    /* Custom Text Colors */
    .text-custom-primary {
        color: var(--brand-secondary) !important;
    }

    /* Custom Background Colors */
    .bg-custom-secondary {
        background-color: var(--brand-secondary) !important;
    }

    /* Custom Border Colors */
    .border-custom-secondary {
        border-color: var(--brand-secondary) !important;
    }

    /* Additional styling for better visual match */
    .card {
        border-radius: 0.5rem;
    }

    .badge {
        font-size: 0.75rem;
        font-weight: 500;
    }

    .table th {
        font-weight: 600;
        color: #6c757d;
        border-bottom: 2px solid #dee2e6;
    }

    .btn-sm {
        padding: 0.25rem 0.75rem;
        font-size: 0.875rem;
    }

    .page-item-hover .page-link {
        color: var(--brand-secondary-hover);
    }

    .page-item-hover:hover .page-link {
        color: var(--brand-secondary);
    }

    .page-item.active .page-link {
        background-color: var(--brand-secondary-hover);
        border-color: var(--brand-secondary-hover);
        color: #fff;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('clientSearch');
        const tableRows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection