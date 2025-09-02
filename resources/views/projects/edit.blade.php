@extends('layouts.app')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Project</h3>
    </div>
    <form action="{{ route('projects.update', $project->ProjectId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $project->Name }}" required>
            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <input type="text" id="program" name="program" class="form-control" value="{{ $project->Program }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="Planned" {{ $project->Status == 'Planned' ? 'selected' : '' }}>Planned</option>
                    <option value="Ongoing" {{ $project->Status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ $project->Status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ $project->Description }}</textarea>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
