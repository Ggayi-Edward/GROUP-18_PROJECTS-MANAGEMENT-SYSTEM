@extends('layouts.app')

@section('title', 'Edit Participant')
@section('page-title', 'Edit Participant')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Participant</h3>
    </div>
    <form action="{{ route('participants.update', $participant->ParticipantId) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" class="form-control" value="{{ $participant->FirstName }}" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control" value="{{ $participant->LastName }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $participant->Email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $participant->Phone }}">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" id="role" name="role" class="form-control" value="{{ $participant->Role }}" required>
            </div>
            <div class="form-group">
                <label for="affiliation">Affiliation</label>
                <input type="text" id="affiliation" name="affiliation" class="form-control" value="{{ $participant->Affiliation }}">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('participants.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
