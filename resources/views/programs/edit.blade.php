@extends('layouts.app')

@section('title', 'Edit Program')
@section('page-title', 'Edit Program')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Edit Program</h3></div>

    <form action="{{ route('programs.update', $program->ProgramId) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="Name">Program Name</label>
                <input type="text" id="Name" name="Name" class="form-control" value="{{ $program->Name }}" required>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea id="Description" name="Description" class="form-control" rows="3">{{ $program->Description }}</textarea>
            </div>
            <div class="form-group">
                <label for="NationalAlignment">National Alignment</label>
                <input type="text" id="NationalAlignment" name="NationalAlignment" class="form-control" value="{{ $program->NationalAlignment }}">
            </div>
            <div class="form-group">
                <label for="FocusAreas">Focus Areas (comma separated)</label>
                <input type="text" id="FocusAreas" name="FocusAreas" class="form-control" value="{{ is_array($program->FocusAreas) ? implode(',', $program->FocusAreas) : $program->FocusAreas }}">
            </div>
            <div class="form-group">
                <label for="Phases">Phases (comma separated)</label>
                <input type="text" id="Phases" name="Phases" class="form-control" value="{{ is_array($program->Phases) ? implode(',', $program->Phases) : $program->Phases }}">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Update <i class="fas fa-save ml-1"></i></button>
        </div>
    </form>
</div>
@endsection
