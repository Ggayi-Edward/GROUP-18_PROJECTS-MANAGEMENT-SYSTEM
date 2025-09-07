@extends('layouts.app')

@section('title', 'Add Service')
@section('page-title', 'Add Service')

@section('content')
<div class="card shadow-sm border-0">
    <!-- Header with Gradient -->
    <div class="card-header text-white" style="background: linear-gradient(135deg, #2c3e50 0%, #2980b9 100%);">
        <h3 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2"></i> New Service
        </h3>
    </div>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="card-body">

            <!-- Service Name -->
            <div class="form-group mb-3">
                <label for="name">Service Name <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name"
                       value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter service name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description"
                          class="form-control @error('description') is-invalid @enderror"
                          rows="3"
                          placeholder="Brief description of the service">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category -->
            <div class="form-group mb-3">
                <label for="category">Category</label>
                <input type="text" id="category" name="category"
                       value="{{ old('category') }}"
                       class="form-control @error('category') is-invalid @enderror"
                       placeholder="e.g., Health, Education, ICT">
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Delivery Mode -->
            <div class="form-group mb-3">
                <label for="deliveryMode">Delivery Mode</label>
                <input type="text" id="deliveryMode" name="deliveryMode"
                       value="{{ old('deliveryMode') }}"
                       class="form-control @error('deliveryMode') is-invalid @enderror"
                       placeholder="e.g., Online, Onsite, Hybrid">
                @error('deliveryMode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Target Groups -->
            <div class="form-group mb-3">
                <label for="targetGroups">Target Groups</label>
                <input type="text" id="targetGroups" name="targetGroups"
                       value="{{ old('targetGroups') }}"
                       class="form-control @error('targetGroups') is-invalid @enderror"
                       placeholder="e.g., Students, Teachers, Administrators">
                <small class="form-text text-muted">Separate multiple groups with commas</small>
                @error('targetGroups')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Facility -->
            <div class="form-group mb-3">
                <label for="facilityId">Facility <span class="text-danger">*</span></label>
                <select id="facilityId" name="facilityId"
                        class="form-control @error('facilityId') is-invalid @enderror" required>
                    <option value="">-- Select Facility --</option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->FacilityId }}" {{ old('facilityId') == $facility->FacilityId ? 'selected' : '' }}>
                            {{ $facility->Name }}
                        </option>
                    @endforeach
                </select>
                @error('facilityId')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Footer -->
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save Service
            </button>
        </div>
    </form>
</div>
@endsection
