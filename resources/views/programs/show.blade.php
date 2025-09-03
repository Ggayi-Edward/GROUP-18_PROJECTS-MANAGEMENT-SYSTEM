@extends('layouts.app')

@section('title', 'Program Details')
@section('page-title', 'Program Details')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programs</a></li>
    <li class="breadcrumb-item active">{{ $program->Name }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $program->Name }}</h3>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card-body">
        <p>{{ $program->Description }}</p>
        <p><strong>National Alignment:</strong> {{ $program->NationalAlignment }}</p>
        <p><strong>Focus Areas:</strong> {{ is_array($program->FocusAreas) ? implode(', ', $program->FocusAreas) : $program->FocusAreas }}</p>
        <p><strong>Phases:</strong> {{ is_array($program->Phases) ? implode(', ', $program->Phases) : $program->Phases }}</p>

        <hr>

        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0">Projects under this Program</h5>
            <a href="{{ route('projects.create') }}?programId={{ $program->ProgramId }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Project (under this Program)
            </a>
        </div>

        @if(!empty($projects))
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Facility</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $proj)
                            <tr>
                                <td>{{ $proj->ProjectId ?? $proj['ProjectId'] }}</td>
                                <td>{{ $proj->Name ?? $proj['Name'] }}</td>
                                <td>
                                    @php
                                        $facility = null;
                                        if (isset($proj->FacilityId)) {
                                            $facility = \App\Data\FakeFacilityRepository::find($proj->FacilityId);
                                        } elseif (isset($proj['FacilityId'])) {
                                            $facility = \App\Data\FakeFacilityRepository::find($proj['FacilityId']);
                                        }
                                    @endphp
                                    {{ $facility->Name ?? $facility['Name'] ?? '—' }}
                                </td>
                                <td>{{ $proj->Status ?? $proj['Status'] ?? '—' }}</td>
                                <td>
                                    <a href="{{ route('projects.show', $proj->ProjectId ?? $proj['ProjectId']) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('projects.edit', $proj->ProjectId ?? $proj['ProjectId']) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">No projects found under this program.</p>
        @endif
    </div>
</div>
@endsection
