@extends('layouts.app')

@section('title', 'Manage Programs')
@section('page-title', 'Manage Programs')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Manage Programs</li>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">All Programs</h3>
        <a href="{{ route('programs.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Add Program
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>National Alignment</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $program)
                        <tr>
                            <td>{{ $program->ProgramId }}</td>
                            <td>{{ $program->Name }}</td>
                            <td>{{ $program->NationalAlignment }}</td>
                            <td class="text-center">
                                <a href="{{ route('programs.show', $program->ProgramId) }}" class="btn btn-info btn-sm me-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('programs.edit', $program->ProgramId) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('programs.destroy', $program->ProgramId) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this program?');">
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
                            <td colspan="4" class="text-center text-muted py-3">No programs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
