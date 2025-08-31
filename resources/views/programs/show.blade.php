@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">{{ $program->Name }}</h3>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="card-body">
        <p>{{ $program->Description }}</p>

        <p><strong>National Alignment:</strong> {{ $program->NationalAlignment ?? 'N/A' }}</p>

        <p>
            <strong>Focus Areas:</strong>
            @if(!empty($program->FocusAreas))
                @foreach($program->FocusAreas as $area)
                    <span class="badge badge-primary me-1">{{ $area }}</span>
                @endforeach
            @else
                N/A
            @endif
        </p>

        <p>
            <strong>Phases:</strong>
            @if(!empty($program->Phases))
                @foreach($program->Phases as $phase)
                    <span class="badge badge-success me-1">{{ $phase }}</span>
                @endforeach
            @else
                N/A
            @endif
        </p>
    </div>

    <div class="card-footer">
        <a href="{{ route('programs.edit', $program->ProgramId) }}" class="btn btn-warning btn-sm me-1">
            <i class="fas fa-edit me-1"></i> Edit
        </a>

        <form action="{{ route('programs.destroy', $program->ProgramId) }}" 
              method="POST" 
              class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete this program?');">
            @csrf 
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash me-1"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
