@extends('layouts.app')

@section('title', 'Project Details')
@section('page-title', 'Project Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $project->Name }}</h3>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <p><strong>Program:</strong> {{ $project->Program }}</p>
        <p><strong>Status:</strong> {{ $project->Status }}</p>
        <p><strong>Description:</strong> {{ $project->Description }}</p>
    </div>
    <div class="card-footer d-flex justify-content-start">
        <a href="{{ route('projects.edit', $project->ProjectId) }}" class="btn btn-warning btn-sm mr-2">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('projects.destroy', $project->ProjectId) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this project?');">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
