@extends('layouts.app')

@section('title', $participant->FullName)


@section('content')
<div class="container-fluid py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">{{ $participant->FullName }}</h3>
        <a href="{{ route('participants.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Email:</strong> {{ $participant->Email }}</p>
            <p><strong>Affiliation:</strong> {{ $participant->Affiliation }}</p>
            <p><strong>Specialization:</strong> {{ $participant->Specialization }}</p>
            <p><strong>Cross Skill Trained:</strong> {{ $participant->CrossSkillTrained ? 'Yes' : 'No' }}</p>
            <p><strong>Institution:</strong> {{ $participant->Institution }}</p>
            <p><strong>Project:</strong> {{ $participant->ProjectName }}</p>
        </div>
        
    </div>
</div>
@endsection
