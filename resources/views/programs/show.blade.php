@extends('layouts.app')

@section('title', $program->Name)
@section('page-title', $program->Name)

@section('styles')
@vite('resources/css/program-details.css')
<link href="{{ asset('css/program-details.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid py-3">

    <!-- Header Row with Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Overview</h3>
        <a href="{{ route('programs.index') }}" class="btn btn-outline-secondary btn-sm">
         Back
        </a>
    </div>

    <!-- Top Info Section -->
    <div class="row g-3 mb-4">
        <!-- Program Info Card -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    @if($program->Description)
                        <div class="mb-2">
                            <div class="text-muted small">Description</div>
                            <div>{{ $program->Description }}</div>
                        </div>
                    @endif

                    @if($program->NationalAlignment)
                        <div class="mb-2">
                            <div class="text-muted small">National Alignment</div>
                            <div>{{ $program->NationalAlignment }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Focus Areas Card -->
        <div class="col-12 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Focus Areas</div>
                    <div class="d-flex flex-wrap gap-1 overflow-auto badges-container">
                        @if(!empty($program->FocusAreas))
                            @foreach($program->FocusAreas as $area)
                                <span class="badge bg-primary">{{ $area }}</span>
                            @endforeach
                        @else
                            <p class="text-muted mb-0">No focus areas defined.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Phases Card -->
        <div class="col-12 col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small mb-2">Phases</div>
                    <div class="d-flex flex-wrap gap-1 overflow-auto badges-container">
                        @if(!empty($program->Phases))
                            @foreach($program->Phases as $phase)
                                <span class="badge bg-secondary">{{ $phase }}</span>
                            @endforeach
                        @else
                            <p class="text-muted mb-0">No phases defined.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Section Header -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Projects</h4>
        <a href="{{ route('projects.create', ['programId' => $program->ProgramId]) }}" class="btn btn-primary btn-sm">
            Add Project
        </a>
    </div>

    <!-- Projects Table -->
    <div class="card shadow-sm projects-table-container">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th style="width: 120px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->Name }}</td>
                            <td class="text-center">
                                <a href="{{ route('projects.show', $project->ProjectId) }}" 
                                   class="btn btn-outline-info btn-sm p-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project->ProjectId) }}" 
                                   class="btn btn-outline-warning btn-sm p-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project->ProjectId) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger btn-sm p-1" 
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
