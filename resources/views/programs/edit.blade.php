@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Edit Program</h3>
    </div>
    <form action="{{ route('programs.update', $program->ProgramId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="name">Program Name</label>
                <input type="text" id="name" name="Name" class="form-control" 
                       value="{{ $program->Name }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="Description" class="form-control" rows="3" required>{{ $program->Description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="nationalAlignment">National Alignment</label>
                <input type="text" id="nationalAlignment" name="NationalAlignment" class="form-control" 
                       value="{{ $program->NationalAlignment }}">
            </div>

            <div class="form-group mb-3">
                <label for="focusAreas">Focus Areas</label>
                <input type="text" id="focusAreas" name="FocusAreas" class="form-control" 
                       value="{{ implode(',', $program->FocusAreas) }}">
                <small class="form-text text-muted">Separate multiple areas with commas</small>
            </div>

            <div class="form-group mb-3">
                <label for="phases">Phases</label>
                <input type="text" id="phases" name="Phases" class="form-control" 
                       value="{{ implode(',', $program->Phases) }}">
                <small class="form-text text-muted">Separate multiple phases with commas</small>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> Update
            </button>
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
