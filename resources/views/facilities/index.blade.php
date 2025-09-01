@extends('layouts.app')

@section('title', 'Manage Facilities')
@section('page-title', 'Manage Facilities')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Manage Facilities</li>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">All Facilities</h3>
        <a href="{{ route('facilities.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Facility
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th class="text-center">Actions</th>
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
                                <a href="{{ route('facilities.show', $facility->FacilityId) }}" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('facilities.edit', $facility->FacilityId) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('facilities.destroy', $facility->FacilityId) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this facility?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
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
