@extends('layouts.app')

@section('title', 'Edit Facility')
@section('page-title', 'Edit Facility')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Facility</h3>
    </div>
    <form action="{{ route('facilities.update', $facility->FacilityId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Facility Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $facility->Name }}" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ $facility->Location }}" required>
            </div>
            <div class="form-group">
                <label for="facilityType">Facility Type</label>
                <input type="text" id="facilityType" name="facilityType" class="form-control" value="{{ $facility->FacilityType }}" required>
            </div>
            <div class="form-group">
                <label for="partnerOrganization">Partner Organization</label>
                <input type="text" id="partnerOrganization" name="partnerOrganization" class="form-control" value="{{ $facility->PartnerOrganization }}">
            </div>
            <div class="form-group">
                <label for="capabilities">Capabilities</label>
                <input type="text" id="capabilities" name="capabilities" class="form-control" value="{{ implode(',', $facility->Capabilities) }}">
                <small class="form-text text-muted">Separate multiple capabilities with commas</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ $facility->Description }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('facilities.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
