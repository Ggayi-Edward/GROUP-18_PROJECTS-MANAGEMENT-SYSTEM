@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Create Program</h3>
    </div>
    <form action="{{ route('programs.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="name">Program Name</label>
                <input type="text" id="name" name="Name" class="form-control" placeholder="Enter program name" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="Description" class="form-control" rows="3" placeholder="Enter program description" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="nationalAlignment">National Alignment</label>
                <input type="text" id="nationalAlignment" name="NationalAlignment" class="form-control" placeholder="NDPIII, 4IR Strategy, etc.">
            </div>

            <div class="form-group mb-3">
                <label for="focusAreas">Focus Areas</label>
                <input type="text" id="focusAreas" name="FocusAreas" class="form-control" placeholder="IoT, Automation, Renewable Energy">
                <small class="form-text text-muted">Separate multiple areas with commas</small>
            </div>

            <div class="form-group mb-3">
                <label for="phases">Phases</label>
                <input type="text" id="phases" name="Phases" class="form-control" placeholder="Cross-Skilling, Collaboration, Prototyping">
                <small class="form-text text-muted">Separate multiple phases with commas</small>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> Save
            </button>
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
