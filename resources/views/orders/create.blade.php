@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold text-secondary">Create New Print Order</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Order</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-custom-secondary">
            <i class="fas fa-arrow-left"></i> Back to Orders
        </a>
    </div>

    <!-- stepper -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="d-flex align-items-center justify-content-between position-relative">
                <div class="progress-line position-absolute w-100"></div>
                <div class="progress-line-active position-absolute w-100"></div>

                <div class="step-item text-center position-relative">
                    <div class="step-circle step-circle-active rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                        <span class="fw-bold">1</span>
                    </div>
                </div>

                <div class="step-item text-center position-relative">
                    <div class="step-circle step-circle-inactive rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                        <span class="fw-bold">2</span>
                    </div>
                </div>

                <div class="step-item text-center position-relative">
                    <div class="step-circle step-circle-inactive rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                        <span class="fw-bold">3</span>
                    </div>
                </div>

                <div class="step-item text-center position-relative">
                    <div class="step-circle step-circle-inactive rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                        <span class="fw-bold">4</span>
                    </div>
                </div>

                <div class="step-item text-center position-relative">
                    <div class="step-circle step-circle-inactive rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                        <span class="fw-bold">5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="orderForm" action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- step 1 -->
        <div class="step-content" id="step-1">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 text-secondary">1. Client Briefing / Order Intake</h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="client_name" class="form-label">Client / Contact Name</label>
                                    <input type="text" class="form-control" id="client_name" name="client_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name" required>
                                </div>
                                <div class="col-12">
                                    <label for="additional_requirements" class="form-label">Additional Requirements / Notes</label>
                                    <textarea class="form-control" id="additional_requirements" name="additional_requirements" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- step 2-->
        <div class="step-content d-none" id="step-2">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-4 bg-white rounded mb-4">
                        <h5 class="mb-4 text-dark fw-bold">2. Product Specifications</h5>

                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="product_type" class="form-label">Product Type</label>
                                <select class="form-select" id="product_type" name="product_type" required>
                                    <option value="">Select Product Type</option>
                                    <option value="business_cards">Business Cards</option>
                                    <option value="brochures">Brochures</option>
                                    <option value="flyers">Flyers</option>
                                    <option value="posters">Posters</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Printing Method Preference</label>
                                <div class="mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="printing_method" id="offset_printing" value="offset_high_volume">
                                        <label class="form-check-label" for="offset_printing">Offset Printing (High Volume)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="printing_method" id="digital_printing" value="digital_low_volume">
                                        <label class="form-check-label" for="digital_printing">Digital Printing (Low Volume)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="size_dimensions" class="form-label">Size / Dimensions</label>
                                <select class="form-select" id="size_dimensions" name="size_dimensions">
                                    <option value="">Select Size</option>
                                    <option value="a4">A4</option>
                                    <option value="a5">A5</option>
                                    <option value="custom">Custom</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="paper_type" class="form-label">Paper Type</label>
                                <select class="form-select" id="paper_type" name="paper_type">
                                    <option value="">Select Paper Type</option>
                                    <option value="matte">Matte</option>
                                    <option value="glossy">Glossy</option>
                                    <option value="uncoated">Uncoated</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="paper_weight" class="form-label">Paper Weight (GSM)</label>
                                <select class="form-select" id="paper_weight" name="paper_weight">
                                    <option value="">Select Weight</option>
                                    <option value="80">80 GSM</option>
                                    <option value="120">120 GSM</option>
                                    <option value="200">200 GSM</option>
                                    <option value="300">300 GSM</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="color_specification" class="form-label">Color Specification</label>
                                <select class="form-select" id="color_specification" name="color_specification">
                                    <option value="">Select Colors</option>
                                    <option value="full_color">Full Color (CMYK)</option>
                                    <option value="black_white">Black & White</option>
                                    <option value="spot_color">Spot Color</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded">
                        <h6 class="text-dark fw-bold mb-3">Post-Press Finishing Options</h6>

                        <div class="mb-3">
                            <label class="form-label">Finishing Option</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cutting_trimming" name="finishing_options[]" value="cutting_trimming">
                                    <label class="form-check-label" for="cutting_trimming">Cutting / Trimming</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="folding" name="finishing_options[]" value="folding">
                                    <label class="form-check-label" for="folding">Folding</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lamination" name="finishing_options[]" value="lamination">
                                    <label class="form-check-label" for="lamination">Lamination</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="varnishing" name="finishing_options[]" value="varnishing">
                                    <label class="form-check-label" for="varnishing">Varnishing</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="die_cutting" name="finishing_options[]" value="die_cutting">
                                    <label class="form-check-label" for="die_cutting">Die-Cutting</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="embossing" name="finishing_options[]" value="embossing">
                                    <label class="form-check-label" for="embossing">Embossing</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="binding_type" class="form-label">Binding Type</label>
                                <select class="form-select" id="binding_type" name="binding_type">
                                    <option value="">No binding required</option>
                                    <option value="saddle_stitch">Saddle Stitch</option>
                                    <option value="perfect_bound">Perfect Bound</option>
                                    <option value="spiral_bound">Spiral Bound</option>
                                    <option value="wire_bound">Wire Bound</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="finishing_instructions" class="form-label">Finishing Instructions</label>
                                <textarea class="form-control" id="finishing_instructions" name="finishing_instructions" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label for="lamination_type" class="form-label">Lamination Type</label>
                                <select class="form-select" id="lamination_type" name="lamination_type">
                                    <option value="">No Lamination</option>
                                    <option value="gloss">Gloss Lamination</option>
                                    <option value="matte">Matte Lamination</option>
                                    <option value="soft_touch">Soft Touch Lamination</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- step 3 -->
        <div class="step-content d-none" id="step-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 text-secondary">3. Files & Artwork Upload</h5>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Design Files</label>
                                    <div class="upload-area rounded p-5 text-center">
                                        <div class="upload-icon mb-3">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                        </div>
                                        <p class="mb-2"><strong>Click to upload</strong> or drag and drop files here</p>
                                        <input type="file" class="form-control d-none" id="design_files" name="design_files[]" multiple accept=".pdf,.ai,.eps,.psd,.jpg,.png">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">File Status</label>
                                    <div class="mt-2">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="file_status" id="print_ready" value="print_ready">
                                            <label class="form-check-label" for="print_ready">Print-ready files</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="file_status" id="needs_prepress" value="needs_prepress">
                                            <label class="form-check-label" for="needs_prepress">Needs pre-press work</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="file_status" id="requires_design" value="requires_design">
                                            <label class="form-check-label" for="requires_design">Requires design service</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="file_notes" class="form-label">File Notes & Instructions</label>
                                    <textarea class="form-control" id="file_notes" name="file_notes" rows="4" placeholder="Any specific instructions for handling the files..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- step 4 -->
        <div class="step-content d-none" id="step-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-4 bg-white rounded mb-4">
                        <h5 class="mb-4 text-dark fw-bold">4. Timeline & Delivery</h5>

                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="delivery_date" class="form-label">Required Delivery Date</label>
                                <input type="date" class="form-control" id="delivery_date" name="delivery_date" required>
                            </div>
                            <div class="col-md-4">
                                <label for="priority_level" class="form-label">Priority Level</label>
                                <select class="form-select" id="priority_level" name="priority_level">
                                    <option value="">Select Priority</option>
                                    <option value="standard">Standard</option>
                                    <option value="urgent">Urgent</option>
                                    <option value="rush">Rush</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="delivery_address" class="form-label">Delivery Address</label>
                                <textarea class="form-control" id="delivery_address" name="delivery_address" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="delivery_method" class="form-label">Delivery Method</label>
                                <select class="form-select" id="delivery_method" name="delivery_method">
                                    <option value="">Select Delivery Method</option>
                                    <option value="pickup">Pickup</option>
                                    <option value="courier">Courier</option>
                                    <option value="postal">Postal Service</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="production_time" class="form-label">Estimated Production Time</label>
                                <input type="text" class="form-control" id="production_time" name="production_time" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded">
                        <h6 class="text-dark fw-bold mb-3">Packaging & Special Requirements</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Packaging Requirements</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="standard_packaging" name="packaging_options[]" value="standard_packaging">
                                            <label class="form-check-label" for="standard_packaging">Standard Packaging</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="custom_branded" name="packaging_options[]" value="custom_branded">
                                            <label class="form-check-label" for="custom_branded">Custom Branded Packaging</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="bulk_packaging" name="packaging_options[]" value="bulk_packaging">
                                            <label class="form-check-label" for="bulk_packaging">Bulk Packaging</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="individual_wrapping" name="packaging_options[]" value="individual_wrapping">
                                            <label class="form-check-label" for="individual_wrapping">Individual wrapping</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="special_instructions" class="form-label">Special Instructions</label>
                                <textarea class="form-control" id="special_instructions" name="special_instructions" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- step 5 -->
        <div class="step-content d-none" id="step-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 text-secondary">5. Order Summary</h5>
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                    <h6 class="text-muted">Order Summary</h6>
                                </div>
                                <p class="text-muted">Review your order details before placing the order.</p>
                                <div id="order-summary-content" class="text-start mt-4">
                                    <!-- Order summary will be populated here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-custom-secondary d-none" id="prevBtn">Previous</button>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-custom-primary" id="nextBtn">Next</button>
                        <button type="submit" class="btn btn-custom-primary d-none" id="submitBtn">Place</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentStep = 1;
        const totalSteps = 5;

        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');

        function showStep(step) {
            document.querySelectorAll('.step-content').forEach(content => {
                content.classList.add('d-none');
            });

            const cur = document.getElementById(`step-${step}`);
            if (cur) cur.classList.remove('d-none');

            document.querySelectorAll('.step-circle').forEach((circle, index) => {
                circle.classList.remove('step-circle-active', 'step-circle-inactive');
                if (index + 1 <= step) {
                    circle.classList.add('step-circle', 'step-circle-active');
                } else {
                    circle.classList.add('step-circle', 'step-circle-inactive');
                }
            });

            const progressLine = document.querySelector('.progress-line-active');
            const progressWidth = ((step - 1) / (totalSteps - 1)) * 100;
            if (progressLine) progressLine.style.width = `${progressWidth}%`;

            if (step === 1) prevBtn.classList.add('d-none');
            else prevBtn.classList.remove('d-none');

            if (step === totalSteps) {
                nextBtn.classList.add('d-none');
                submitBtn.classList.remove('d-none');
            } else {
                nextBtn.classList.remove('d-none');
                submitBtn.classList.add('d-none');
            }
        }

        nextBtn.addEventListener('click', function() {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        });

        prevBtn.addEventListener('click', function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        const uploadArea = document.querySelector('.upload-area');
        const fileInput = document.getElementById('design_files');

        if (uploadArea && fileInput) {
            uploadArea.addEventListener('click', () => fileInput.click());

            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                try {
                    fileInput.files = e.dataTransfer.files;
                } catch (err) {
                    console.warn('Unable to assign dropped files programmatically:', err);
                }
            });
        }

        showStep(1);
        
    });
</script>

<style>
    :root {
        --primay-color: #ED1C24;
        --primay-color-hover: #A11219FF;
        --secondary-color: #050A30;
        --color-light: #f8f9fa;
        --color-lighter: #e9ecef;
        --: #ffffff;
        --color-focus-shadow: rgba(20, 30, 80, 0.25);
    }

    .text-primary {
        color: var(--primay-color) !important;
    }

    .text-secondary {
        color: var(--secondary-color) !important;
    }

    .btn-custom-primary {
        background-color: var(--primay-color);
        border-color: var(--primay-color);
        color: var(--);
    }

    .btn-custom-primary:hover {
        background-color: var(--primay-color-hover);
        border-color: var(--primay-color-hover);
        color: var(--);
    }

    .btn-outline-custom-secondary {
        color: var(--secondary-color);
        border-color: var(--secondary-color);
        background-color: transparent;
    }

    .btn-outline-custom-secondary:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--);
    }

    .progress-line {
        height: 2px;
        background-color: var(--color-lighter);
        top: 50%;
        z-index: 1;
    }

    .progress-line-active {
        height: 2px;
        background-color: var(--primay-color);
        top: 50%;
        z-index: 2;
        width: 0%;
        transition: width 0.3s ease;
    }

    .form-check-input:checked {
        background-color: var(--primay-color);
        border-color: var(--primay-color);
    }

    .step-item {
        z-index: 3;
    }

    .step-circle {
        width: 40px;
        height: 40px;
        transition: all 0.3s ease;
    }

    .step-circle-active {
        background-color: var(--primay-color) !important;
        color: var(--) !important;
    }

    .step-circle-inactive {
        background-color: var(--color-light) !important;
        color: #6c757d !important;
    }

    .upload-area {
        border: 2px dashed var(--color-lighter);
        background-color: var(--color-light);
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .upload-area:hover {
        background-color: var(--color-lighter) !important;
    }

    .upload-area.dragover {
        background-color: var(--color-lighter) !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem var(--color-focus-shadow);
    }
</style>
@endsection