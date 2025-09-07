@extends('layouts.app')

@section('title', 'Add Equipment')
@section('page-title', 'Add Equipment')

@section('styles')
<style>
    /* Gradient header for the card */
    .card-header-gradient {
        background: linear-gradient(135deg, #2c3e50 0%, #2980b9 100%);
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-3">

    <!-- Card Wrapper -->
    <div class="card shadow-sm">
        <div class="card-header card-header-gradient d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">New Equipment</h3>
            <a href="{{ route('equipment.index') }}" class="btn btn-outline-light btn-sm">Back</a>
        </div>

        <form action="{{ route('equipment.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row g-3">
                    <!-- Left Column -->
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label for="Name">Equipment Name <span class="text-danger">*</span></label>
                            <input type="text" id="Name" name="Name"
                                   value="{{ old('Name') }}"
                                   class="form-control @error('Name') is-invalid @enderror"
                                   placeholder="Enter equipment name" required>
                            @error('Name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="Capability">Capability</label>
                            <input type="text" id="Capability" name="Capability"
                                   value="{{ old('Capability') }}"
                                   class="form-control @error('Capability') is-invalid @enderror"
                                   placeholder="Enter capability">
                            @error('Capability')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="Description">Description</label>
                            <textarea id="Description" name="Description" rows="3"
                                      class="form-control @error('Description') is-invalid @enderror"
                                      placeholder="Enter description">{{ old('Description') }}</textarea>
                            @error('Description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label for="FacilityId">Facility <span class="text-danger">*</span></label>
                            <select id="FacilityId" name="FacilityId" class="form-control" required>
                                <option value="">-- Select Facility --</option>
                                @foreach($facilities as $facility)
                                    <option value="{{ $facility->FacilityId }}"
                                        {{ old('FacilityId') == $facility->FacilityId ? 'selected' : '' }}>
                                        {{ $facility->Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('FacilityId')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-1"></i> Save Equipment
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
