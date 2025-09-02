@extends('layouts.app')

@section('title', 'Participant Details')
@section('page-title', 'Participant Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $participant->FirstName }} {{ $participant->LastName }}</h3>
        <a href="{{ route('participants.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card-body">
        <p><strong>Email:</strong> {{ $participant->Email }}</p>
        <p><strong>Phone:</strong> {{ $participant->Phone }}</p>
        <p><strong>Role:</strong> {{ $participant->Role }}</p>
        <p><strong>Affiliation:</strong> {{ $participant->Affiliation }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('participants.edit', $participant->ParticipantId) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('participants.destroy', $participant->ParticipantId) }}" method="POST" style="display:inline"
              onsubmit="return confirm('Are you sure you want to delete this participant?');">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
