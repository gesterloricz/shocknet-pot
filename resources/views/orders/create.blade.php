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
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <!-- Fixed name attribute to match controller expectation -->
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name" required>
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
                                <!-- Updated to use dropdown instead of radio buttons -->
                                <select class="form-select" id="printing_method" name="printing_method" required>
                                    <option value="">Select Printing Method</option>
                                    <option value="offset_high_volume">Offset Printing (High Volume)</option>
                                    <option value="digital_low_volume">Digital Printing (Low Volume)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="size" class="form-label">Size / Dimensions</label>
                                <!-- Fixed name attribute to match controller expectation -->
                                <select class="form-select" id="size" name="size">
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
                                <label for="color_spec" class="form-label">Color Specification</label>
                                <!-- Fixed name attribute to match controller expectation -->
                                <select class="form-select" id="color_spec" name="color_spec">
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

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="finishing_option" class="form-label">Finishing Option</label>
                                <!-- Updated dropdown options to match attachment -->
                                <select class="form-select" id="finishing_option" name="finishing_option">
                                    <option value="">Select Finishing Option</option>
                                    <option value="cutting_trimming">Cutting/Trimming</option>
                                    <option value="folding">Folding</option>
                                    <option value="lamination">Lamination</option>
                                    <option value="varnishing">Varnishing</option>
                                    <option value="die_cutting">Die-Cutting</option>
                                    <option value="embossing">Embossing</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
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
                                        <!-- Fixed name attribute to match controller expectation -->
                                        <input type="file" class="form-control d-none" id="design_files" name="artwork_file[]" multiple accept=".pdf,.ai,.eps,.psd,.jpg,.png">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mt-2">
                                        <label for="file_status" class="form-label">File Status</label>
                                        <div class="mt-2">
                                            <!-- Updated to use dropdown instead of radio buttons -->
                                            <select class="form-select" id="file_status" name="file_status">
                                                <option value="">Select</option>
                                                <option value="print_ready">Print-Ready Files</option>
                                                <option value="needs_prepress">Needs Pre-Press Work</option>
                                                <option value="requires_design">Requires Design Service</option>
                                            </select>
                                        </div>
                                    </div>
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
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <!-- Updated to use dropdown instead of checkboxes -->
                                <label for="packaging_requirements" class="form-label">Packing Requirements</label>
                                <select class="form-select" id="packaging_requirements" name="packaging_requirements">
                                    <option value="">Select Packing Requirement</option>
                                    <option value="standard">Standard Packaging</option>
                                    <option value="custom_branded">Custom Branded Packaging</option>
                                    <option value="bulk">Bulk Packaging</option>
                                    <option value="individual">Individual wrapping</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- step 5 -->
        <div class="step-content d-none" id="step-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Replaced placeholder content with comprehensive order summary -->
                    <div class="p-4 bg-white rounded">
                        <h5 class="mb-4 text-dark fw-bold">5. Order Summary</h5>
                        <p class="text-muted mb-4">Review your order details before placing the order.</p>

                        <!-- Client Information Summary -->
                        <div class="mb-4">
                            <h6 class="text-dark fw-bold mb-3 border-bottom pb-2">Client Information</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 120px;">Client Name:</strong>
                                        <span id="summary-client-name" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 120px;">Email:</strong>
                                        <span id="summary-email" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 120px;">Phone:</strong>
                                        <span id="summary-phone" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 120px;">Project:</strong>
                                        <span id="summary-project-name" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-12" id="summary-requirements-section" style="display: none;">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 120px;">Requirements:</strong>
                                        <span id="summary-requirements" class="text-dark">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Specifications Summary -->
                        <div class="mb-4">
                            <h6 class="text-dark fw-bold mb-3 border-bottom pb-2">Product Specifications</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Product Type:</strong>
                                        <span id="summary-product-type" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Quantity:</strong>
                                        <span id="summary-quantity" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Printing Method:</strong>
                                        <span id="summary-printing-method" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Size:</strong>
                                        <span id="summary-size" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Paper Type:</strong>
                                        <span id="summary-paper-type" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Paper Weight:</strong>
                                        <span id="summary-paper-weight" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Color:</strong>
                                        <span id="summary-color" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Binding Type:</strong>
                                        <span id="summary-binding" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-12" id="summary-finishing-section" style="display: none;">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Finishing Options:</strong>
                                        <span id="summary-finishing" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-12" id="summary-finishing-instructions-section" style="display: none;">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Instructions:</strong>
                                        <span id="summary-finishing-instructions" class="text-dark">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline & Delivery Summary -->
                        <div class="mb-4">
                            <h6 class="text-dark fw-bold mb-3 border-bottom pb-2">Timeline & Delivery</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Delivery Date:</strong>
                                        <span id="summary-delivery-date" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Priority Level:</strong>
                                        <span id="summary-priority" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Delivery Method:</strong>
                                        <span id="summary-delivery-method" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Production Time:</strong>
                                        <span id="summary-production-time" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-12" id="summary-delivery-address-section" style="display: none;">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Delivery Address:</strong>
                                        <span id="summary-delivery-address" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-12" id="summary-packaging-section" style="display: none;">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Packaging:</strong>
                                        <span id="summary-packaging" class="text-dark">-</span>
                                    </div>
                                </div>
                                <div class="col-12" id="summary-special-instructions-section" style="display: none;">
                                    <div class="d-flex">
                                        <strong class="text-muted me-3" style="min-width: 140px;">Special Instructions:</strong>
                                        <span id="summary-special-instructions" class="text-dark">-</span>
                                    </div>
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
                if (currentStep === 5) {
                    generateOrderSummary();
                }
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

        function generateOrderSummary() {
            // Populate Client Information
            document.getElementById('summary-client-name').textContent = document.getElementById('client_name').value || '-';
            document.getElementById('summary-email').textContent = document.getElementById('email').value || '-';
            document.getElementById('summary-phone').textContent = document.getElementById('phone_number').value || '-';
            document.getElementById('summary-project-name').textContent = document.getElementById('project_name').value || '-';

            // Populate Product Specifications
            document.getElementById('summary-product-type').textContent = getOptionText('product_type', document.getElementById('product_type').value) || '-';
            document.getElementById('summary-quantity').textContent = document.getElementById('quantity').value || '-';
            document.getElementById('summary-printing-method').textContent = getOptionText('printing_method', document.getElementById('printing_method').value) || '-';
            document.getElementById('summary-size').textContent = getOptionText('size', document.getElementById('size').value) || '-';
            document.getElementById('summary-paper-type').textContent = getOptionText('paper_type', document.getElementById('paper_type').value) || '-';
            document.getElementById('summary-paper-weight').textContent = document.getElementById('paper_weight').value ? document.getElementById('paper_weight').value + ' GSM' : '-';
            document.getElementById('summary-color').textContent = getOptionText('color_spec', document.getElementById('color_spec').value) || '-';
            document.getElementById('summary-binding').textContent = getOptionText('binding_type', document.getElementById('binding_type').value) || '-';

            // Handle finishing options
            const finishingOption = getOptionText('finishing_option', document.getElementById('finishing_option').value);
            if (finishingOption && finishingOption !== '-') {
                document.getElementById('summary-finishing').textContent = finishingOption;
                document.getElementById('summary-finishing-section').style.display = 'block';
            }

            // Populate Timeline & Delivery
            document.getElementById('summary-delivery-date').textContent = document.getElementById('delivery_date').value || '-';
            document.getElementById('summary-priority').textContent = getOptionText('priority_level', document.getElementById('priority_level').value) || '-';
            document.getElementById('summary-delivery-method').textContent = getOptionText('delivery_method', document.getElementById('delivery_method').value) || '-';
            document.getElementById('summary-production-time').textContent = document.getElementById('production_time').value || '-';

            // Handle delivery address
            const deliveryAddress = document.getElementById('delivery_address').value;
            if (deliveryAddress) {
                document.getElementById('summary-delivery-address').textContent = deliveryAddress;
                document.getElementById('summary-delivery-address-section').style.display = 'block';
            }

            // Handle packaging
            const packaging = getOptionText('packaging_requirements', document.getElementById('packaging_requirements').value);
            if (packaging && packaging !== '-') {
                document.getElementById('summary-packaging').textContent = packaging;
                document.getElementById('summary-packaging-section').style.display = 'block';
            }
        }

        function getOptionText(selectId, value) {
            const select = document.getElementById(selectId);
            const option = select.querySelector(`option[value="${value}"]`);
            return option ? option.textContent : value;
        }

    });
</script>

<script>
    document.getElementById("delivery_date").addEventListener("change", function() {
        let deliveryDate = new Date(this.value);
        let today = new Date();

        if (deliveryDate && !isNaN(deliveryDate.getTime())) {
            let diffTime = deliveryDate.getTime() - today.getTime();
            let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            let productionTime = "";

            if (diffDays <= 0) {
                productionTime = "Invalid date (must be future)";
            } else if (diffDays <= 3) {
                productionTime = "Rush (3 days)";
            } else if (diffDays <= 7) {
                productionTime = "Urgent (1 week)";
            } else {
                productionTime = "Standard (" + diffDays + " days available)";
            }

            document.getElementById("production_time").value = productionTime;
        } else {
            document.getElementById("production_time").value = "";
        }
    });
</script>

<style>
    :root {
        --primay-color: #ED1C24;
        --primay-color-hover: #A11219FF;
        --secondary-color: #050A30;
        --color-light: #f8f9fa;
        --color-lighter: #e9ecef;
        --color-white: #ffffff;
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
        color: var(--color-white);
    }

    .btn-custom-primary:hover {
        background-color: var(--primay-color-hover);
        border-color: var(--primay-color-hover);
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
        color: var(--color-white) !important;
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