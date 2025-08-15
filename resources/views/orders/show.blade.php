@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Order #{{ $order->id }}</h2>

    <!-- timeline/details -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title text-custom-primary">
                Order #{{ $order->id }} - {{ $order->project->name ?? 'No Project' }} Timeline Details
            </h5>

            <!-- timeline steps -->
            @include('partials.timeline')

            <!-- status info -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <strong>Current Status:</strong> {{ $order->status }}
                </div>
                <div class="col-md-4">
                    <strong>Estimated Completion:</strong> {{ $order->due_date }}
                </div>
                <div class="col-md-4">
                    <strong>Next Stage:</strong>
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
@endsection
