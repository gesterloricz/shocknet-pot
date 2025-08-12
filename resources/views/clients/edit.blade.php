@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold text-primary">{{ $client->id ?? '1' }} | {{ $client->name ?? 'ABC Marketing' }}</h2>
    </div>

    <form action="{{ route('clients.update', $client->id ?? 1) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded p-4 mb-4">
            <h5 class="mb-4 fw-semibold text-primary">1. Client Information</h5>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <label for="client_name" class="form-label text-primary fw-medium">Client / Contact Name</label>
                    <input type="text" 
                           class="form-control" 
                           id="client_name" 
                           name="client_name" 
                           value="{{ old('client_name', $client->name ?? '') }}"
                           placeholder="Enter client name"
                           required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label text-primary fw-medium">Email Address</label>
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', $client->email ?? '') }}"
                           placeholder="Enter email address"
                           required>
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label text-primary fw-medium">Phone Number</label>
                    <input type="tel" 
                           class="form-control" 
                           id="phone" 
                           name="phone" 
                           value="{{ old('phone', $client->phone ?? '') }}"
                           placeholder="Enter phone number">
                </div>

                <div class="col-md-6">
                    <label for="project_name" class="form-label text-primary fw-medium">Project Name</label>
                    <input type="text" 
                           class="form-control" 
                           id="project_name" 
                           name="project_name" 
                           value="{{ old('project_name', $client->project_name ?? '') }}"
                           placeholder="Enter project name">
                </div>

                <div class="col-12">
                    <label for="notes" class="form-label text-primary fw-medium">Additional Requirements / Notes</label>
                    <textarea class="form-control" 
                              id="notes" 
                              name="notes" 
                              rows="4" 
                              placeholder="Enter any additional requirements or notes">{{ old('notes', $client->notes ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            <button type="submit" class="btn btn-primary px-4">Save</button>
        </div>
    </form>
</div>

<style>
:root {
    --primary: #ED1C24;
    --primary-hover: #A11219FF;
    --secondary: #050A30;
    --light: #f8f9fa;
    --white: #ffffff;
}

.btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
    color: var(--white);
}

.btn-primary:hover {
    background-color: var(--primary-hover);
    border-color: var(--primary-hover);
    color: var(--white);
}

.form-control {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    padding: 0.75rem;
}

.form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.2rem rgba(237, 28, 36, 0.25);
}

.text-primary {
    color: var(--secondary) !important;
}
</style>
@endsection
