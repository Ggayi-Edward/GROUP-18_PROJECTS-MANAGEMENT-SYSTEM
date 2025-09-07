@extends('layouts.app')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

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
<div class="card">
    <div class="card-header card-header-gradient">
        <h3 class="card-title">Edit {{ $service->Name }}</h3>
    </div>

    <form action="{{ route('services.update', $service->ServiceId) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="card-body">
            {{-- Service Name --}}
            <div class="form-group mb-3">
                <label for="name">Service Name</label>
                <input type="text" id="name" name="name" class="form-control"
                       value="{{ old('name', $service->Name) }}" required>
            </div>

            {{-- Description --}}
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $service->Description) }}</textarea>
            </div>

            {{-- Category --}}
            <div class="form-group mb-3">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" class="form-control"
                       value="{{ old('category', $service->Category) }}">
            </div>

            {{-- Delivery Mode --}}
            <div class="form-group mb-3">
                <label for="deliveryMode">Delivery Mode</label>
                <input type="text" id="deliveryMode" name="deliveryMode" class="form-control"
                       value="{{ old('deliveryMode', $service->DeliveryMode) }}">
            </div>

            {{-- Target Groups --}}
            <div class="form-group mb-3">
                <label for="targetGroups">Target Groups (comma separated)</label>
                <input type="text" id="targetGroups" name="targetGroups" class="form-control"
                       value="{{ old('targetGroups', implode(', ', $service->TargetGroups ?? [])) }}">
            </div>

            {{-- Facility --}}
            <div class="form-group mb-3">
                <label for="facilityId">Facility</label>
                <select id="facilityId" name="facilityId" class="form-control">
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->FacilityId }}"
                            {{ $service->FacilityId == $facility->FacilityId ? 'selected' : '' }}>
                            {{ $facility->Name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">
                Update <i class="fas fa-save ms-1"></i>
            </button>
        </div>
    </form>
</div>
@endsection
