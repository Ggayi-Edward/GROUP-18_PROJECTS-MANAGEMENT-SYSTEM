@extends('layouts.app')

@section('title', 'Create Program')
@section('page-title', 'Create Program')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programs</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Create Program</h3></div>

    <form action="{{ route('programs.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="Name">Program Name</label>
                <input type="text" id="Name" name="Name" class="form-control" placeholder="Enter program name" required value="{{ old('Name') }}">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea id="Description" name="Description" class="form-control" rows="3" placeholder="Enter program description">{{ old('Description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="NationalAlignment">National Alignment</label>
                <input type="text" id="NationalAlignment" name="NationalAlignment" class="form-control" placeholder="NDPIII, 4IR Strategy, etc." value="{{ old('NationalAlignment') }}">
            </div>
            <div class="form-group">
                <label for="FocusAreas">Focus Areas (comma separated)</label>
                <input type="text" id="FocusAreas" name="FocusAreas" class="form-control" placeholder="IoT, Automation" value="{{ old('FocusAreas') }}">
            </div>
            <div class="form-group">
                <label for="Phases">Phases (comma separated)</label>
                <input type="text" id="Phases" name="Phases" class="form-control" placeholder="Design, Pilot" value="{{ old('Phases') }}">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Save <i class="fas fa-check ml-1"></i></button>
        </div>
    </form>
</div>
@endsection
