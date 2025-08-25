@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold text-dark">Order #{{ $project->id }}</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Back to Orders</a>
    </div>

    <div class="bg-white rounded p-4 mb-4">
        <div class="progress-container mb-4">
            <div class="progress-steps d-flex justify-content-between align-items-center position-relative">
                <div class="progress-line"></div>

                <div class="step-item text-center">
                    <div class="step-circle {{ $project->status == 'pre-press' ? 'active' : (in_array($project->status, ['printing', 'post-press', 'packaging', 'complete']) ? 'completed' : '') }}" data-step="pre-press">
                        <span>1</span>
                    </div>
                    <div class="step-label mt-2">Pre-press</div>
                </div>

                <div class="step-item text-center">
                    <div class="step-circle {{ $project->status == 'printing' ? 'active' : (in_array($project->status, ['post-press', 'packaging', 'complete']) ? 'completed' : '') }}" data-step="printing">
                        <span>2</span>
                    </div>
                    <div class="step-label mt-2">Printing</div>
                </div>

                <div class="step-item text-center">
                    <div class="step-circle {{ $project->status == 'post-press' ? 'active' : (in_array($project->status, ['packaging', 'complete']) ? 'completed' : '') }}" data-step="post-press">
                        <span>3</span>
                    </div>
                    <div class="step-label mt-2">Post-press</div>
                </div>

                <div class="step-item text-center">
                    <div class="step-circle {{ $project->status == 'packaging' ? 'active' : ($project->status == 'Complete' ? 'completed' : '') }}" data-step="packaging">
                        <span>4</span>
                    </div>
                    <div class="step-label mt-2">Packaging</div>
                </div>

                <div class="step-item text-center">
                    <div class="step-circle {{ $project->status == 'complete' ? 'active completed' : '' }}" data-step="complete">
                        <span>5</span>
                    </div>
                    <div class="step-label mt-2">Complete</div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <strong class="text-dark">Current Status:</strong>
                <span id="current-status">{{ ucfirst(str_replace('-', ' ', $project->status)) }}</span>
            </div>
            <div class="col-md-4">
                <strong class="text-dark">Estimated Completion:</strong>
                <span id="estimated-completion">
                    {{ $project->delivery ? \Carbon\Carbon::parse($project->delivery->delivery_date)->format('M d, Y') : 'Not Set' }}
                </span>
            </div>
            <div class="col-md-4">
                <strong class="text-dark">Next Stage:</strong>
                <span id="next-stage">{{ ucfirst(str_replace('-', ' ', $nextStage)) }}</span>
            </div>
        </div>
    </div>

    <form action="{{ route('orders.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white rounded p-4 mb-4">
            <h5 class="mb-4 fw-semibold text-dark">Client Information</h5>

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label text-dark fw-medium">Client ID</label>
                    <input type="text"
                        class="form-control"
                        value="{{ $project->client->id ?? 'N/A' }}"
                        readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-dark fw-medium">Client / Contact Name</label>
                    <input type="text"
                        class="form-control"
                        value="{{ $project->client->client_name ?? 'N/A' }}"
                        readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-dark fw-medium">Email Address</label>
                    <input type="email"
                        class="form-control"
                        value="{{ $project->client->email ?? 'N/A' }}"
                        readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-dark fw-medium">Phone Number</label>
                    <input type="text"
                        class="form-control"
                        value="{{ $project->client->phone_number ?? 'N/A' }}"
                        readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-dark fw-medium">Project Name</label>
                    <input type="text"
                        class="form-control"
                        value="{{ $project->project_name ?? 'N/A' }}"
                        readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-dark fw-medium">Current Status</label>
                    <input type="text"
                        class="form-control"
                        value="{{ ucfirst($project->status ?? 'N/A') }}"
                        readonly>
                </div>
            </div>
        </div>

        <div class="bg-white rounded p-4 mb-4">
            <h5 class="mb-4 fw-semibold text-dark">Product Specifications</h5>

            <div class="row g-4">
                <div class="col-md-4">
                    <label for="product_type" class="form-label text-dark fw-medium">Product Type</label>
                    <select class="form-select" id="product_type" name="product_type">
                        <option value="">Select Product Type</option>
                        <option value="business_cards" {{ old('product_type', $project->specification->product_type ?? '') == 'business_cards' ? 'selected' : '' }}>Business Cards</option>
                        <option value="brochures" {{ old('product_type', $project->specification->product_type ?? '') == 'brochures' ? 'selected' : '' }}>Brochures</option>
                        <option value="flyers" {{ old('product_type', $project->specification->product_type ?? '') == 'flyers' ? 'selected' : '' }}>Flyers</option>
                        <option value="posters" {{ old('product_type', $project->specification->product_type ?? '') == 'posters' ? 'selected' : '' }}>Posters</option>
                        <option value="banners" {{ old('product_type', $project->specification->product_type ?? '') == 'banners' ? 'selected' : '' }}>Banners</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="quantity" class="form-label text-dark fw-medium">Quantity</label>
                    <input type="number"
                        class="form-control"
                        id="quantity"
                        name="quantity"
                        value="{{ old('quantity', $project->specification->quantity ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label for="printing_method" class="form-label text-dark fw-medium">Printing Method</label>
                    <select class="form-select" id="printing_method" name="printing_method">
                        <option value="">Select Printing Method</option>
                        <option value="offset_high_volume" {{ old('printing_method', $project->specification->printing_method ?? '') == 'offset_high_volume' ? 'selected' : '' }}>Offset Printing (High Volume)</option>
                        <option value="digital_low_volume" {{ old('printing_method', $project->specification->printing_method ?? '') == 'digital_low_volume' ? 'selected' : '' }}>Digital Printing (Low Volume)</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="size" class="form-label text-dark fw-medium">Size / Dimensions</label>
                    <select class="form-select" id="size" name="size">
                        <option value="">Select Size</option>
                        <option value="a4" {{ old('size', $project->specification->size ?? '') == 'a4' ? 'selected' : '' }}>A4</option>
                        <option value="a5" {{ old('size', $project->specification->size ?? '') == 'a5' ? 'selected' : '' }}>A5</option>
                        <option value="letter" {{ old('size', $project->specification->size ?? '') == 'letter' ? 'selected' : '' }}>Letter</option>
                        <option value="custom" {{ old('size', $project->specification->size ?? '') == 'custom' ? 'selected' : '' }}>Custom</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="paper_type" class="form-label text-dark fw-medium">Paper Type</label>
                    <select class="form-select" id="paper_type" name="paper_type">
                        <option value="">Select Paper Type</option>
                        <option value="matte" {{ old('paper_type', $project->specification->paper_type ?? '') == 'matte' ? 'selected' : '' }}>Matte</option>
                        <option value="glossy" {{ old('paper_type', $project->specification->paper_type ?? '') == 'glossy' ? 'selected' : '' }}>Glossy</option>
                        <option value="satin" {{ old('paper_type', $project->specification->paper_type ?? '') == 'satin' ? 'selected' : '' }}>Satin</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="paper_weight" class="form-label text-dark fw-medium">Paper Weight (GSM)</label>
                    <select class="form-select" id="paper_weight" name="paper_weight">
                        <option value="">Select Weight</option>
                        <option value="80" {{ old('paper_weight', $project->specification->paper_weight ?? '') == '80' ? 'selected' : '' }}>80 GSM</option>
                        <option value="120" {{ old('paper_weight', $project->specification->paper_weight ?? '') == '120' ? 'selected' : '' }}>120 GSM</option>
                        <option value="150" {{ old('paper_weight', $project->specification->paper_weight ?? '') == '150' ? 'selected' : '' }}>150 GSM</option>
                        <option value="200" {{ old('paper_weight', $project->specification->paper_weight ?? '') == '200' ? 'selected' : '' }}>200 GSM</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="color_spec" class="form-label text-dark fw-medium">Color Specification</label>
                    <select class="form-select" id="color_spec" name="color_spec">
                        <option value="">Select Colors</option>
                        <option value="full_color" {{ old('color_spec', $project->specification->color_spec ?? '') == 'full_color' ? 'selected' : '' }}>Full Color (CMYK)</option>
                        <option value="black_white" {{ old('color_spec', $project->specification->color_spec ?? '') == 'black_white' ? 'selected' : '' }}>Black & White</option>
                        <option value="spot_color" {{ old('color_spec', $project->specification->color_spec ?? '') == 'spot_color' ? 'selected' : '' }}>Spot Color</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white rounded p-4 mb-4">
            <h5 class="mb-4 fw-semibold text-dark">Delivery Details</h5>

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="delivery_address" class="form-label text-dark fw-medium">Delivery Address</label>
                    <textarea class="form-control"
                        id="delivery_address"
                        name="delivery_address"
                        rows="3">{{ old('delivery_address', $project->delivery->delivery_address ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label for="delivery_method" class="form-label text-dark fw-medium">Delivery Method</label>
                    <select class="form-select" id="delivery_method" name="delivery_method">
                        <option value="">Select Delivery Method</option>
                        <option value="pickup" {{ old('delivery_method', $project->delivery->delivery_method ?? '') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                        <option value="courier " {{ old('delivery_method', $project->delivery->delivery_method ?? '') == 'courier' ? 'selected' : '' }}>Courier</option>
                        <option value="postal" {{ old('delivery_method', $project->delivery->delivery_method ?? '') == 'postal' ? 'selected' : '' }}>Postal Service</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white rounded p-4 mb-4">
            <h5 class="mb-4 fw-semibold text-dark">Update Order Status</h5>

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="status" class="form-label text-dark fw-medium">Order Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pre-press" {{ $project->status == 'Pre-press' ? 'selected' : '' }}>Pre-press</option>
                        <option value="printing" {{ $project->status == 'Printing' ? 'selected' : '' }}>Printing</option>
                        <option value="post-press" {{ $project->status == 'Post-press' ? 'selected' : '' }}>Post-press</option>
                        <option value="packaging" {{ $project->status == 'Packaging' ? 'selected' : '' }}>Packaging</option>
                        <option value="complete" {{ $project->status == 'Complete' ? 'selected' : '' }}>Complete</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="priority" class="form-label text-dark fw-medium">Priority Level</label>
                    <select class="form-select" id="priority" name="priority">
                        <option value="standard" {{ ($project->delivery->priority_level ?? 'standard') == 'standard' ? 'selected' : '' }}>Standard</option>
                        <option value="urgent" {{ ($project->delivery->priority_level ?? '') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                        <option value="rush" {{ ($project->delivery->priority_level ?? '') == 'rush' ? 'selected' : '' }}>Rush</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="delivery_date" class="form-label text-dark fw-medium">Delivery Date</label>
                    <input type="date"
                        class="form-control"
                        id="delivery_date"
                        name="delivery_date"
                        value="{{ old('delivery_date', $project->delivery->delivery_date ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label for="estimated_production_time" class="form-label text-dark fw-medium">Estimated Production Time</label>
                    <input type="text"
                        class="form-control"
                        id="estimated_production_time"
                        name="estimated_production_time"
                        value="{{ old('estimated_production_time', $project->delivery->estimated_production_time?? '') }}"
                        placeholder="e.g., 5-7 business days">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-3">
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
            <button type="submit" class="btn btn-primary px-4">Update Order</button>
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

    .form-control,
    .form-select {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 0.75rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(237, 28, 36, 0.25);
    }

    .text-dark {
        color: var(--secondary) !important;
    }

    .progress-container {
        padding: 2rem 0;
    }

    .progress-steps {
        max-width: 800px;
        margin: 0 auto;
    }

    .progress-line {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #dee2e6;
        z-index: 1;
        transform: translateY(-50%);
    }

    .step-item {
        position: relative;
        z-index: 2;
        flex: 1;
    }

    .step-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #dee2e6;
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.1rem;
        margin: 0 auto;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .step-circle.active {
        background-color: var(--primary);
        color: white;
    }

    .step-circle.completed {
        background-color: var(--primary);
        color: white;
    }

    .step-label {
        font-size: 0.9rem;
        color: var(--secondary);
        font-weight: 500;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status');
        const currentStatusSpan = document.getElementById('current-status');
        const nextStageSpan = document.getElementById('next-stage');

        const statusOrder = ['pre-press', 'printing', 'post-press', 'packaging', 'complete'];
        const statusLabels = {
            'pre-press': 'pre-press',
            'printing': 'printing',
            'post-press': 'post-press',
            'packaging': 'packaging',
            'complete': 'complete'
        };

    });
</script>
@endsection