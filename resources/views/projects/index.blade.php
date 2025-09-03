@extends('layouts.app')

@section('title', 'Manage Projects')
@section('page-title', 'Manage Projects')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Manage Projects</li>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">All Projects</h3>
        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Project
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Program</th>
                        <th>Facility</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->ProjectId }}</td>
                            <td>{{ $project->Name }}</td>
                            <td>{{ $project->Program ? $project->Program->Name : 'N/A' }}</td>
                            <td>{{ $project->Facility ? $project->Facility->Name : 'N/A' }}</td>
                            <td>{{ $project->Status }}</td>
                            <td class="text-center">
                                <a href="{{ route('projects.show', $project->ProjectId) }}" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project->ProjectId) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project->ProjectId) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this project?');">
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
                            <td colspan="6" class="text-center text-muted">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
