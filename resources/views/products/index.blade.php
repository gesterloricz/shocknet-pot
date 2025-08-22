@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="bg-white rounded shadow-sm p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold text-dark">Products Dashboard</h2>
            <button type="button" class="btn px-4" style="background-color: var(--primary-color, #ED1C24); border-color: var(--primary-color, #ED1C24); color: white;">
                + Add Product
            </button>
        </div>
    </div>


    <div class="bg-white rounded shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0 fw-semibold text-dark">Product Catalog</h5>
            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Search products..." style="width: 250px;">
                <select class="form-select" style="width: 150px;">
                    <option>All Categories</option>
                    <option>Business Cards</option>
                    <option>Brochures</option>
                    <option>Flyers</option>
                    <option>Banners</option>
                    <option>Stickers</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="fw-semibold text-dark">Product Name</th>
                        <th scope="col" class="fw-semibold text-dark">Category</th>
                        <th scope="col" class="fw-semibold text-dark">Last Updated</th>
                        <th scope="col" class="fw-semibold text-dark">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-medium">Standard Business Cards</td>
                        <td>Business Cards</td>
                        <td>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary btn-sm px-3">Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm px-3">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Tri-fold Brochures</td>
                        <td>Brochures</td>
                        <td>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary btn-sm px-3">Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm px-3">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-medium">A4 Flyers</td>
                        <td>Flyers</td>
                        <td>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary btn-sm px-3">Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm px-3">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-medium">Vinyl Banners</td>
                        <td>Banners</td>
                        <td>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-primary btn-sm px-3">Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm px-3">Delete</button>
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
        --primary-hover: #A11219FF;
        --secondary-color: #050A30;
        --light-color: #f8f9fa;
        --white-color: #ffffff;
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