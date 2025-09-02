@extends('layouts.app')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('services.update', $service->ServiceId) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $service->Name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $service->Description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ $service->Category }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Delivery Mode</label>
                <input type="text" name="deliveryMode" class="form-control" value="{{ $service->DeliveryMode }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Target Groups (comma separated)</label>
                <input type="text" name="targetGroups" class="form-control" value="{{ implode(', ', $service->TargetGroups) }}">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('services.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn btn-warning">
                    Update <i class="fas fa-save ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
