@extends('layouts.app')

@section('title', $equipment->Name)
@section('page-title', $equipment->Name)

@section('content')
<div class="container-fluid py-3">

    <!-- Header Row with Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">{{ $equipment->Name }}</h3>
        <a href="{{ route('equipment.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>

    <!-- Info Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header text-white"
             style="background: linear-gradient(135deg, #2c3e50 0%, #2980b9 100%);">
            <h5 class="mb-0"><i class="fas fa-cogs me-2"></i> Equipment Details</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Capabilities:</strong>
                <span class="text-muted">{{ $equipment->Capabilities ?: 'N/A' }}</span>
            </div>
            <div class="mb-3">
                <strong>Description:</strong>
                <span class="text-muted">{{ $equipment->Description ?: 'No description provided' }}</span>
            </div>
            <div class="mb-3">
                <strong>Facility:</strong>
                <span class="text-muted">{{ $equipment->FacilityName ?? 'N/A' }}</span>
            </div>
            <div class="mb-3">
                <strong>Inventory Code:</strong>
                <span class="text-muted">{{ $equipment->InventoryCode ?: 'N/A' }}</span>
            </div>
            <div class="mb-3">
                <strong>Usage Domain:</strong>
                <span class="text-muted">{{ $equipment->UsageDomain ?: 'N/A' }}</span>
            </div>
            <div class="mb-3">
                <strong>Support Phase:</strong>
                <span class="text-muted">{{ $equipment->SupportPhase ?: 'N/A' }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
