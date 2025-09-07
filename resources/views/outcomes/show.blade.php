@extends('layouts.app')

@section('title', 'Outcome Details')
@section('page-title', 'Outcome Details')

@section('styles')
@vite('resources/css/program-details.css')
<link href="{{ asset('css/program-details.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid py-3">

    <!-- Header with Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Overview</h3>
        <a href="{{ route('outcomes.index') }}" class="btn btn-outline-secondary btn-sm">
        Back
        </a>
    </div>

    <!-- Top Info Cards -->
    <div class="row g-3 mb-4">
        <!-- Outcome Info -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="mb-2">
                        <div class="text-muted small">Type</div>
                        <div>{{ $outcome->Type }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="text-muted small">Certification Status</div>
                        <div>{{ $outcome->CertificationStatus ?: 'N/A' }}</div>
                    </div>
                    <div class="mb-2">
                        <div class="text-muted small">Commercialization Status</div>
                        <div>{{ $outcome->Commercialization ?: 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Description</div>
                    <div>{{ $outcome->Description ?: '-' }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Artifact Section -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Artifact</h4>

    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            @if($outcome->FilePath)
    <a href="{{ asset($outcome->FilePath) }}" download
       class="btn btn-outline-primary btn-sm">
        <i class="fas fa-download me-1"></i> Download Artifact
    </a>
@else
    <span class="text-muted">No file uploaded</span>
@endif

        </div>
    </div>




</div>
@endsection
