@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Project Status Timeline -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between position-relative">
                <!-- Progress Line Background -->
                <div class="position-absolute w-100" style="height: 2px; background-color: #e9ecef; top: 50%; transform: translateY(-50%); z-index: 1;"></div>
                
                <!-- Progress Steps -->
                <div class="d-flex justify-content-between w-100 position-relative" style="z-index: 2;">
                    <!-- Made each step clickable for status updates -->
                    <div class="text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold mb-2 status-step" 
                             style="width: 40px; height: 40px; background-color: var(--bs-primary, #ED1C24); cursor: pointer;"
                             data-step="1" data-status="Client Briefing" data-next="Pre-press Processing">1</div>
                        <small class="text-muted">Client Briefing</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold mb-2 status-step" 
                             style="width: 40px; height: 40px; background-color: var(--bs-primary, #ED1C24); cursor: pointer;"
                             data-step="2" data-status="Pre-press Processing" data-next="Printing Stage">2</div>
                        <small class="text-muted">Pre-press</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold mb-2 status-step" 
                             style="width: 40px; height: 40px; background-color: var(--bs-primary, #ED1C24); cursor: pointer;"
                             data-step="3" data-status="Printing Stage" data-next="Post-press Processing">3</div>
                        <small class="text-muted">Printing</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-muted fw-bold mb-2 status-step" 
                             style="width: 40px; height: 40px; background-color: #e9ecef; border: 2px solid #dee2e6; cursor: pointer;"
                             data-step="4" data-status="Post-press Processing" data-next="Packaging Stage">4</div>
                        <small class="text-muted">Post-press</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-muted fw-bold mb-2 status-step" 
                             style="width: 40px; height: 40px; background-color: #e9ecef; border: 2px solid #dee2e6; cursor: pointer;"
                             data-step="5" data-status="Packaging Stage" data-next="Ready for Delivery">5</div>
                        <small class="text-muted">Packaging</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-muted fw-bold mb-2 status-step" 
                             style="width: 40px; height: 40px; background-color: #e9ecef; border: 2px solid #dee2e6; cursor: pointer;"
                             data-step="6" data-status="Delivery Complete" data-next="Project Completed">6</div>
                        <small class="text-muted">Delivery</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Information -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="fw-bold text-dark mb-1">Current Status:</div>
            <div class="text-muted" id="current-status">In Progress - Printing Stage</div>
        </div>
        <div class="col-md-4">
            <div class="fw-bold text-dark mb-1">Estimated Completion:</div>
            <div class="text-muted" id="estimated-completion">July 15, 2025</div>
        </div>
        <div class="col-md-4">
            <div class="fw-bold text-dark mb-1">Next Stage:</div>
            <div class="text-muted" id="next-stage">Post-press Processing</div>
        </div>
    </div>

    <!-- Removed Update Status button since stepper handles status updates -->
</div>

<style>
:root {
    --bs-primary: #ED1C24;
    --bs-primary-hover: #A11219FF;
    --bs-secondary: #050A30;
}

.btn-primary {
    background-color: var(--bs-primary);
    border-color: var(--bs-primary);
}

.btn-primary:hover {
    background-color: var(--bs-primary-hover);
    border-color: var(--bs-primary-hover);
}

/* Added hover effects for interactive steps */
.status-step:hover {
    transform: scale(1.1);
    transition: transform 0.2s ease;
}

.status-step.completed {
    background-color: var(--bs-primary) !important;
    color: white !important;
    border: none !important;
}

.status-step.pending {
    background-color: #e9ecef !important;
    color: #6c757d !important;
    border: 2px solid #dee2e6 !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusSteps = document.querySelectorAll('.status-step');
    const currentStatusEl = document.getElementById('current-status');
    const nextStageEl = document.getElementById('next-stage');
    
    statusSteps.forEach(step => {
        step.addEventListener('click', function() {
            const stepNumber = parseInt(this.dataset.step);
            const statusText = this.dataset.status;
            const nextStageText = this.dataset.next;
            
            // Update visual state of steps
            statusSteps.forEach((s, index) => {
                const currentStep = index + 1;
                if (currentStep <= stepNumber) {
                    s.classList.add('completed');
                    s.classList.remove('pending');
                    s.style.backgroundColor = 'var(--bs-primary, #ED1C24)';
                    s.style.color = 'white';
                    s.style.border = 'none';
                } else {
                    s.classList.add('pending');
                    s.classList.remove('completed');
                    s.style.backgroundColor = '#e9ecef';
                    s.style.color = '#6c757d';
                    s.style.border = '2px solid #dee2e6';
                }
            });
            
            // Update status information
            currentStatusEl.textContent = `In Progress - ${statusText}`;
            nextStageEl.textContent = stepNumber < 6 ? nextStageText : 'Project Completed';
            
            // Here you would typically make an AJAX call to update the database
            console.log(`Status updated to step ${stepNumber}: ${statusText}`);
        });
    });
});
</script>
@endsection
