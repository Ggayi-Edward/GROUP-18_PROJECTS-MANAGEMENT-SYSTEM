@extends('layouts.app')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

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
        <h3 class="card-title">Edit {{ $project->Name }}</h3>
    </div>

    <form action="{{ route('projects.update', $project->ProjectId) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="card-body">
            {{-- Project Name --}}
            <div class="form-group mb-3">
                <label for="name">Project Name</label>
                <input type="text" id="name" name="name" class="form-control"
                       value="{{ old('name', $project->Name) }}" required>
            </div>

            {{-- Program --}}
            <div class="form-group mb-3">
                <label for="programId">Program</label>
                <select id="programId" name="programId" class="form-control" required>
                    @foreach($programs as $program)
                        <option value="{{ $program->ProgramId }}"
                            {{ $project->ProgramId == $program->ProgramId ? 'selected' : '' }}>
                            {{ $program->Name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Facility --}}
            <div class="form-group mb-3">
                <label for="facilityId">Facility</label>
                <select id="facilityId" name="facilityId" class="form-control" required>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->FacilityId }}"
                            {{ $project->FacilityId == $facility->FacilityId ? 'selected' : '' }}>
                            {{ $facility->Name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Status --}}
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="Planned"   {{ $project->Status == 'Planned' ? 'selected' : '' }}>Planned</option>
                    <option value="Ongoing"   {{ $project->Status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ $project->Status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            {{-- Description --}}
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $project->Description) }}</textarea>
            </div>

            {{-- Participants --}}
            <div class="form-group mb-3">
                <label for="participants">Participants (comma separated)</label>
                <input type="text" id="participants" name="participants" class="form-control"
                       value="{{ old('participants', implode(', ', $project->Participants ?? [])) }}">
            </div>

            {{-- Outcomes --}}
            <div class="form-group mb-3">
                <label for="outcomes">Outcomes (comma separated)</label>
                <input type="text" id="outcomes" name="outcomes" class="form-control"
                       value="{{ old('outcomes', implode(', ', $project->Outcomes ?? [])) }}">
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                Cancel
            </a>
            <button type="submit" class="btn btn-success">
                Update <i class="fas fa-save ms-1"></i>
            </button>
        </div>
    </form>
</div>
@endsection
