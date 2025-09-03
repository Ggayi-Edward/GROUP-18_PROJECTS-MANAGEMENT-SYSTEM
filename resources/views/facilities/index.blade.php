@extends('layouts.app')

@section('title', 'Manage Facilities')
@section('page-title', 'Manage Facilities')

@section('breadcrumb')
    <li class="breadcrumb-item active">Facilities</li>
@endsection

@section('styles')
<style>
    /* Make table rows smaller */
    .table-smaller th,
    .table-smaller td {
        padding: 0.35rem 0.5rem !important; /* reduce padding */
        vertical-align: middle !important; /* center content */
        font-size: 0.85rem; /* slightly smaller text */
    }
</style>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center text-white"
         style="background: linear-gradient(135deg, #2c3e50 0%, #2980b9 100%);">
        <div class="card-title mb-0">
            <i class="fas fa-hospital-alt mr-2"></i> All Facilities
        </div>
        <div class="ml-auto">
            <a href="{{ route('facilities.create') }}"
               class="btn btn-sm text-white"
               style="background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);">
                <i class="fas fa-plus"></i> Add Facility
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-smaller mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th style="width: 10%;">ID</th>
                        <th style="width: 25%;">Name</th>
                        <th style="width: 30%;">Location</th>
                        <th style="width: 15%;">Type</th>
                        <th class="text-center" style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($facilities as $facility)
                        <tr>
                            <td>{{ $facility->FacilityId }}</td>
                            <td>{{ $facility->Name }}</td>
                            <td>{{ $facility->Location }}</td>
                            <td>{{ $facility->FacilityType }}</td>
                            <td class="text-center">
                                <a href="{{ route('facilities.show', $facility->FacilityId) }}"
                                   class="btn btn-xs text-white"
                                   style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('facilities.edit', $facility->FacilityId) }}"
                                   class="btn btn-xs text-white"
                                   style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('facilities.destroy', $facility->FacilityId) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this facility?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-xs text-white"
                                            style="background: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%);">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No facilities found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
