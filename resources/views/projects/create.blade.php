@extends('layouts.app')

@section('title', 'Create Project')
@section('page-title', 'Create Project')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-plus-circle mr-2"></i> New Project</h3>
        <a href="{{ route('projects.index') }}" class="btn btn-sm btn-light">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <!-- Project Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Project Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter project name" required>
                    </div>
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="">-- Select Status --</option>
                            <option value="Planned" {{ old('status') == 'Planned' ? 'selected' : '' }}>Planned</option>
                            <option value="Ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Program -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="programId">Program</label>
                        @if(!empty($programs) && count($programs))
                            <select id="programId" name="programId" class="form-control" required>
                                <option value="">-- Select Program --</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->ProgramId }}"
                                        {{ (old('programId') == $program->ProgramId) || (isset($preselectedProgramId) && $preselectedProgramId == $program->ProgramId) ? 'selected' : '' }}>
                                        {{ $program->Name }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-control" disabled>
                                <option>No programs available — create a program first</option>
                            </select>
                        @endif
                    </div>
                </div>

                <!-- Facility -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="facilityId">Facility</label>
                        @if(!empty($facilities) && count($facilities))
                            <select id="facilityId" name="facilityId" class="form-control" required>
                                <option value="">-- Select Facility --</option>
                                @foreach($facilities as $facility)
                                    <option value="{{ $facility->FacilityId }}"
                                        {{ (old('facilityId') == $facility->FacilityId) || (isset($preselectedFacilityId) && $preselectedFacilityId == $facility->FacilityId) ? 'selected' : '' }}>
                                        {{ $facility->Name }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-control" disabled>
                                <option>No facilities available — create a facility first</option>
                            </select>
                        @endif
                    </div>
                </div>
            </div>

            <!-- rest of form (dates, description, participants, outcomes) unchanged -->
            <!-- ... -->
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Project</button>
        </div>
    </form>
</div>
@endsection
