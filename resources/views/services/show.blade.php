@extends('layouts.app')

@section('title', $service->Name)
@section('page-title', $service->Name)

@section('styles')
@vite('resources/css/project-details.css')
<link href="{{ asset('css/project-details.css') }}" rel="stylesheet">
<style>
    /* tiny square icon buttons */
    .icon-square.btn {
        width: 28px;
        height: 28px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .table td, .table th {
        padding: .35rem .5rem;
    } /* compact rows */
</style>
@endsection

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Overview</h3>
        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    <!-- Top Info Section -->
    <div class="row g-3 mb-4">
        <!-- Service Info -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="mb-2"><span class="text-muted small">Description</span>
                        <div>{{ $service->Description ?: '-' }}</div>
                    </div>
                    <div class="mb-2"><span class="text-muted small">Category</span>
                        <div>{{ $service->Category ?: '-' }}</div>
                    </div>
                    <div class="mb-2"><span class="text-muted small">Delivery Mode</span>
                        <div>{{ $service->DeliveryMode ?: '-' }}</div>
                    </div>
                    <div class="mb-2"><span class="text-muted small">Target Groups</span>
                        <div>{{ !empty($service->TargetGroups) ? implode(', ', $service->TargetGroups) : '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Facility -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="mb-2"><span class="text-muted small">Facility</span>
                        <div>{{ $service->FacilityId ? \App\Data\FakeFacilityRepository::find($service->FacilityId)->Name : 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->


</div>
@endsection
