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
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter project name" required>
            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <input type="text" id="program" name="program" class="form-control" placeholder="Linked program" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="Planned">Planned</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter project description"></textarea>
            </div>
        </div>
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
