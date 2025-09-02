@extends('layouts.app')

@section('title', 'Add Participant')
@section('page-title', 'Add Participant')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Participant</h3>
    </div>
    <form action="{{ route('participants.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" id="role" name="role" class="form-control" placeholder="Student, Mentor, etc." required>
            </div>
            <div class="form-group">
                <label for="affiliation">Affiliation</label>
                <input type="text" id="affiliation" name="affiliation" class="form-control" placeholder="University, Company, etc.">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('participants.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save
            </button>
        </div>
    </form>
</div>
@endsection
