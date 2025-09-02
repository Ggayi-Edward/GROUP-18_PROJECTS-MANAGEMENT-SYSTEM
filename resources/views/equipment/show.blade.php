@extends('layouts.app')

@section('title', 'Equipment Details')
@section('page-title', 'Equipment Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $equipment->Name }}</h3>
        <a href="{{ route('equipment.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">
        <p><strong>Capability:</strong> {{ $equipment->Capability }}</p>
        <p><strong>Facility:</strong> {{ $equipment->facility->Name }}</p>
        <p><strong>Description:</strong> {{ $equipment->Description }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('equipment.edit', $equipment->EquipmentId) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
        <form action="{{ route('equipment.destroy', $equipment->EquipmentId) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure?');">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
        </form>
    </div>
</div>
@endsection
