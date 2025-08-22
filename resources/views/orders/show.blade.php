@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Order #{{ $project->id }}</h2>
    <!-- details -->
    <div class="card mt-4">
        <div class="card-body">

            <!-- timeline -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>1</small>
                            </div>
                            <div class="small mt-1">Client Briefing</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>2</small>
                            </div>
                            <div class="small mt-1">Pre-press</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>3</small>
                            </div>
                            <div class="small mt-1">Printing</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>4</small>
                            </div>
                            <div class="small mt-1">Post-press</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>5</small>
                            </div>
                            <div class="small mt-1">Packaging</div>
                        </div>
                        <div class="flex-fill mx-2">
                            <hr class="timeline-connector">
                        </div>
                        <div class="text-center">
                            <div class="rounded-circle bg-custom-secondary text-white d-inline-flex align-items-center justify-content-center timeline-step">
                                <small>6</small>
                            </div>
                            <div class="small mt-1">Complete</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- status -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <strong>Current Status:</strong> ?? ???????? ? ????????? ?????
                </div>
                <div class="col-md-4">
                    <strong>Estimated Completion:</strong> ???? ??? ????
                </div>
                <div class="col-md-4">
                    <strong>Next Stage:</strong> ???????? ?????
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-custom-primary me-2">Update Status</button>
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

        .btn-outline-custom-success {
            color: var(--brand-success);
            border-color: var(--brand-success);
            background-color: transparent;
        }

        .btn-outline-custom-success:hover {
            background-color: var(--brand-success);
            border-color: var(--brand-success);
            color: var(--color-white);
        }

        .btn-outline-custom-info {
            color: var(--brand-info);
            border-color: var(--brand-info);
            background-color: transparent;
        }

        .btn-outline-custom-info:hover {
            background-color: var(--brand-info);
            border-color: var(--brand-info);
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