@extends('layouts.app')

@section('title', 'Projects')
@section('page-title', 'Manage Projects')

@section('breadcrumb')
    <li class="breadcrumb-item active">Projects</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Projects</h3>
        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New Project
        </a>
    </div>
    <div class="card-body">
        @if(count($projects) > 0)
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->ProjectId }}</td>
                            <td>{{ $project->Name }}</td>
                            <td>{{ $project->Program }}</td>
                            <td>{{ $project->Status }}</td>
                            <td>
                                <a href="{{ route('projects.show', $project->ProjectId) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project->ProjectId) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project->ProjectId) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No projects found. <a href="{{ route('projects.create') }}">Create one</a>.</p>
        @endif
    </div>
</div>
@endsection
