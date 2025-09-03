@extends('layouts.app')

@section('title', 'Create Project')
@section('page-title', 'Create Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Project</h3>
    </div>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <!-- Project Name -->
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter project name" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter project description"></textarea>
            </div>

            <!-- Program dropdown -->
            <div class="form-group">
                <label for="programId">Program</label>
                <select id="programId" name="programId" class="form-control" required>
                    <option value="">-- Select Program --</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->ProgramId }}">{{ $program->Name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Facility dropdown -->
            <div class="form-group">
                <label for="facilityId">Facility</label>
                <select id="facilityId" name="facilityId" class="form-control" required>
                    <option value="">-- Select Facility --</option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->FacilityId }}">{{ $facility->Name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Dates -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate" name="startDate" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate" name="endDate" class="form-control">
                </div>
            </div>

            <!-- Status dropdown -->
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Planned">Planned</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <!-- Participants -->
            <div class="form-group">
                <label for="participants">Participants</label>
                <input type="text" id="participants" name="participants" class="form-control" placeholder="Comma-separated names">
            </div>

            <!-- Outcomes -->
            <div class="form-group">
                <label for="outcomes">Outcomes</label>
                <input type="text" id="outcomes" name="outcomes" class="form-control" placeholder="Comma-separated outcomes">
            </div>
        </div>

        <!-- Footer with buttons -->
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save
            </button>
        </div>
    </form>
</div>
@endsection
