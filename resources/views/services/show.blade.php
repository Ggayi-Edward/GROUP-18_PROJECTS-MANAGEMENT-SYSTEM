@extends('layouts.app')

@section('title', 'View Service')
@section('page-title', 'View Service')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
    <li class="breadcrumb-item active">{{ $service->Name }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $service->Name }}</h3>
        <a href="{{ route('services.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="card-body">
        <p>{{ $service->Description }}</p>
        <p><strong>Category:</strong> {{ $service->Category }}</p>
        <p><strong>Delivery Mode:</strong> {{ $service->DeliveryMode }}</p>
        <p><strong>Target Groups:</strong> {{ implode(', ', $service->TargetGroups) }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('services.edit', $service->ServiceId) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('services.destroy', $service->ServiceId) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
