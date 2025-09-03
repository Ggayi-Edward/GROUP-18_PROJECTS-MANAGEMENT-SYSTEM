@extends('layouts.app')

@section('title', $project->Name)
@section('page-title', $project->Name)

@section('styles')
@vite('resources/css/project-details.css')
<link href="{{ asset('css/project-details.css') }}" rel="stylesheet">
<style>
    /* tiny square icon buttons */
    .icon-square.btn {
        width: 28px;
        height: 28px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .table td, .table th {
        padding: .35rem .5rem;
    } /* compact rows */
</style>
@endsection

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Overview</h3>
        <a href="{{ route('programs.index') }}" class="btn btn-outline-secondary btn-sm">
         Back
        </a>
    </div>

    <!-- Top Info Section -->
    <div class="row g-3 mb-4">
        <!-- Project Info -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="mb-2"><span class="text-muted small">Description</span><div>{{ $project->Description }}</div></div>
                    <div class="mb-2"><span class="text-muted small">Status</span><div>{{ $project->Status }}</div></div>
                    
                </div>
            </div>
        </div>

        <!-- Program & Facility -->
        <div class="col-12 col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="mb-2"><span class="text-muted small">Program</span>
                        <div>{{ $program ? $program->Name : 'N/A' }}</div>
                    </div>
                    <div class="mb-2"><span class="text-muted small">Facility</span>
                        <div>{{ $facility ? $facility->Name : 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Participants</h4>
        <a href="{{ route('participants.create', ['projectId' => $project->ProjectId]) }}" class="btn btn-primary btn-sm">
            Add Participant
        </a>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th style="width:110px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($project->Participants ?? [] as $p)
                        @php
                            $pid   = is_object($p) ? ($p->ParticipantId ?? null)
                                   : (is_array($p) ? ($p['ParticipantId'] ?? null) : null);
                            $pname = is_object($p) ? ($p->Name ?? '')
                                   : (is_array($p) ? ($p['Name'] ?? '') : (string)$p);
                        @endphp
                        <tr>
                            <td>{{ $pname }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ $pid ? route('participants.show', $pid) : '#' }}"
                                       class="btn btn-outline-secondary icon-square {{ $pid ? '' : 'disabled' }}"
                                       title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{ $pid ? route('participants.edit', $pid) : '#' }}"
                                       class="btn btn-outline-warning icon-square {{ $pid ? '' : 'disabled' }}"
                                       title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ $pid ? route('participants.destroy', $pid) : '#' }}"
                                          method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger icon-square {{ $pid ? '' : 'disabled' }}"
                                                {{ $pid ? '' : 'disabled' }}
                                                onclick="return confirm('Remove this participant?')"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="2" class="text-center text-muted">No participants found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Outcomes -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Outcomes</h4>
        <a href="{{ route('outcomes.create', ['projectId' => $project->ProjectId]) }}" class="btn btn-primary btn-sm">
            Add Outcome
        </a>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Outcome</th>
                        <th>Artifact</th>
                        <th style="width:110px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($project->Outcomes ?? [] as $o)
                        @php
                            $oid    = is_object($o) ? ($o->OutcomeId ?? null)
                                    : (is_array($o) ? ($o['OutcomeId'] ?? null) : null);
                            $otitle = is_object($o) ? ($o->Title ?? ($o->Name ?? ''))
                                    : (is_array($o) ? ($o['Title'] ?? ($o['Name'] ?? '')) : (string)$o);
                            $link   = is_object($o) ? ($o->ArtifactLink ?? null)
                                    : (is_array($o) ? ($o['ArtifactLink'] ?? null) : null);
                        @endphp
                        <tr>
                            <td>{{ $otitle }}</td>
                            <td>
                                @if($link)
                                    <a href="{{ $link }}" target="_blank" rel="noopener">View artifact</a>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ $oid ? route('outcomes.show', $oid) : '#' }}"
                                       class="btn btn-outline-secondary icon-square {{ $oid ? '' : 'disabled' }}"
                                       title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{ $oid ? route('outcomes.edit', $oid) : '#' }}"
                                       class="btn btn-outline-warning icon-square {{ $oid ? '' : 'disabled' }}"
                                       title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ $oid ? route('outcomes.destroy', $oid) : '#' }}"
                                          method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-outline-danger icon-square {{ $oid ? '' : 'disabled' }}"
                                                {{ $oid ? '' : 'disabled' }}
                                                onclick="return confirm('Delete this outcome?')"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted">No outcomes defined.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
