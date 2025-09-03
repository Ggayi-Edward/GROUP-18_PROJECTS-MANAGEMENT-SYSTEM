@extends('layouts.app')

@section('title', 'Edit Equipment')
@section('page-title', 'Edit Equipment')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Edit Equipment</h3></div>
    <form action="{{ route('equipment.update', $equipment->EquipmentId) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Equipment Name</label>
                <input type="text" id="name" name="name" value="{{ $equipment->Name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="capability">Capability</label>
                <input type="text" id="capability" name="capability" value="{{ $equipment->Capability }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="facilityId">Facility</label>
                <select id="facilityId" name="facilityId" class="form-control" required>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->FacilityId }}" {{ $equipment->FacilityId == $facility->FacilityId ? 'selected' : '' }}>
                            {{ $facility->Name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3">{{ $equipment->Description }}</textarea>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('equipment.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
        </div>
    </form>
</div>
@endsection
