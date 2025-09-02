@extends('layouts.app')

@section('title', 'Facility Details')
@section('page-title', 'Facility Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $facility->Name }}</h3>
        <a href="{{ route('facilities.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <p><strong>Location:</strong> {{ $facility->Location }}</p>
        <p><strong>Type:</strong> {{ $facility->FacilityType }}</p>
        <p><strong>Partner Organization:</strong> {{ $facility->PartnerOrganization }}</p>
        <p><strong>Capabilities:</strong> {{ implode(', ', $facility->Capabilities) }}</p>
        <p><strong>Description:</strong> {{ $facility->Description }}</p>
    </div>
    <!-- <div class="card-footer">
        <a href="{{ route('facilities.edit', $facility->FacilityId) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('facilities.destroy', $facility->FacilityId) }}" 
              method="POST" 
              style="display:inline"
              onsubmit="return confirm('Are you sure you want to delete this facility?');">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>-->
</div>
@endsection
