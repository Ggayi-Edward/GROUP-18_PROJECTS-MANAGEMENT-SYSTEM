@extends('layouts.app')

@section('title', $facility->Name)
@section('page-title', $facility->Name)

@section('styles')
@vite('resources/css/facility-details.css')
<link href="{{ asset('css/facility-details.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid py-3">

  
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Overview</h3>
        <a href="{{ route('programs.index') }}" class="btn btn-outline-secondary btn-sm">
         Back
        </a>
    </div>


    <!-- Top Info Section -->
    <div class="row g-3 mb-4">
        <!-- Facility Info Card -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    @if($facility->Location)
                        <div class="mb-2">
                            <div class="text-muted small">Location</div>
                            <div>{{ $facility->Location }}</div>
                        </div>
                    @endif

                    @if($facility->FacilityType)
                        <div class="mb-2">
                            <div class="text-muted small">Type</div>
                            <div>{{ $facility->FacilityType }}</div>
                        </div>
                    @endif

                    @if($facility->PartnerOrganization)
                        <div class="mb-2">
                            <div class="text-muted small">Partner Organization</div>
                            <div>{{ $facility->PartnerOrganization }}</div>
                        </div>
                    @endif

                    @if($facility->Description)
                        <div class="mb-2">
                            <div class="text-muted small">Description</div>
                            <div>{{ $facility->Description }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Capabilities Card -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Capabilities</div>
                    <div class="d-flex flex-wrap gap-1 overflow-auto badges-container">
                        @if(!empty($facility->Capabilities))
                            @foreach($facility->Capabilities as $capability)
                                <span class="badge bg-primary">{{ $capability }}</span>
                            @endforeach
                        @else
                            <p class="text-muted mb-0">No capabilities defined.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Services</h4>
        <a href="{{ route('services.create', ['facilityId' => $facility->FacilityId]) }}" class="btn btn-primary btn-sm">
            Add Service
        </a>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th style="width: 120px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->Name }}</td>
                            <td class="text-center">
                                <a href="{{ route('services.show', $service->ServiceId) }}" 
                                   class="btn btn-outline-info btn-sm p-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('services.edit', $service->ServiceId) }}" 
                                   class="btn btn-outline-warning btn-sm p-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('services.destroy', $service->ServiceId) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger btn-sm p-1" 
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">No services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Equipment Section -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Equipment</h4>
        <a href="{{ route('equipment.create', ['facilityId' => $facility->FacilityId]) }}" class="btn btn-primary btn-sm">
            Add Equipment
        </a>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th style="width: 120px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipment as $item)
                        <tr>
                            <td>{{ $item->Name }}</td>
                            <td class="text-center">
                                <a href="{{ route('equipment.show', $item->EquipmentId) }}" 
                                   class="btn btn-outline-info btn-sm p-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('equipment.edit', $item->EquipmentId) }}" 
                                   class="btn btn-outline-warning btn-sm p-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('equipment.destroy', $item->EquipmentId) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this equipment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger btn-sm p-1" 
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">No equipment found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Projects Section -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Projects</h4>
        <a href="{{ route('projects.create', ['facilityId' => $facility->FacilityId]) }}" class="btn btn-primary btn-sm">
            Add Project
        </a>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th style="width: 120px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->Name }}</td>
                            <td class="text-center">
                                <a href="{{ route('projects.show', $project->ProjectId) }}" 
                                   class="btn btn-outline-info btn-sm p-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project->ProjectId) }}" 
                                   class="btn btn-outline-warning btn-sm p-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project->ProjectId) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger btn-sm p-1" 
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
