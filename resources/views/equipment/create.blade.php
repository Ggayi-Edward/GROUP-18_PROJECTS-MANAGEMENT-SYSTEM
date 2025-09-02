@extends('layouts.app')

@section('title', 'Create Equipment')
@section('page-title', 'Create Equipment')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Add Equipment</h3></div>
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Equipment Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter equipment name" required>
            </div>
            <div class="form-group">
                <label for="capability">Capability</label>
                <input type="text" id="capability" name="capability" class="form-control" placeholder="Enter equipment capability">
            </div>
            <div class="form-group">
                <label for="facilityId">Facility</label>
                <select id="facilityId" name="facilityId" class="form-control" required>
                    <option value="">-- Select Facility --</option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->FacilityId }}">{{ $facility->Name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('equipment.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>
@endsection
