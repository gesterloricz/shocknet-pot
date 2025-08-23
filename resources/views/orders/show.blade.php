@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold text-dark">Order #{{ $project->id ?? '1' }}</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-custom-secondary">Back to Orders</a>
    </div>
    <!-- details -->
    <div class="card mt-4">
        <div class="card-body">

            <!-- timeline -->
            @php
            $statuses = ['Pre-press', 'Printing', 'Post-press', 'Packaging', 'Complete'];
            $currentIndex = array_search($project->status, $statuses);
            $nextStage = $statuses[$currentIndex + 1] ?? 'N/A';
            @endphp

            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @foreach ($statuses as $index => $status)
                        <div class="text-center">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center timeline-step 
                                    {{ $index <= $currentIndex ? 'bg-custom-secondary text-white' : 'bg-light border border-custom-secondary text-muted' }}">
                                <small>{{ $index + 1 }}</small>
                            </div>
                            <div class="small mt-1">{{ $status }}</div>
                        </div>
                        @if ($index < count($statuses) - 1)
                            <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- status -->
        <div class="row mt-4">
            <div class="col-md-4">
                <strong>Current Status:</strong> {{ $project->status }}
            </div>
            <div class="col-md-4">
                <strong>Estimated Completion:</strong>
                {{ optional($project->delivery)->delivery_date ? \Carbon\Carbon::parse($project->delivery->delivery_date)->format('M d, Y') : 'N/A' }}
            </div>
            <div class="col-md-4">
                <strong>Next Stage:</strong> {{ $nextStage }}
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('orders.edit', $project) }}" class="btn btn-custom-primary">Edit Order</a>
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