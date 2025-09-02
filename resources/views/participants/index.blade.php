@extends('layouts.app')

@section('title', 'Participants')
@section('page-title', 'Manage Participants')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Participants</h3>
        <a href="{{ route('participants.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Participant
        </a>
    </div>
    <div class="card-body">
        @if (count($participants) > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Affiliation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $participant)
                        <tr>
                            <td>{{ $participant->ParticipantId }}</td>
                            <td>{{ $participant->FirstName }} {{ $participant->LastName }}</td>
                            <td>{{ $participant->Email }}</td>
                            <td>{{ $participant->Phone }}</td>
                            <td>{{ $participant->Role }}</td>
                            <td>{{ $participant->Affiliation }}</td>
                            <td>
                                <a href="{{ route('participants.show', $participant->ParticipantId) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('participants.edit', $participant->ParticipantId) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('participants.destroy', $participant->ParticipantId) }}" 
                                      method="POST" style="display:inline"
                                      onsubmit="return confirm('Delete this participant?');">
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
            <p>No participants found.</p>
        @endif
    </div>
</div>
@endsection
