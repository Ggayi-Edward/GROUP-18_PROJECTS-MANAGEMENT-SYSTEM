@extends('layouts.app')

@section('title', 'Add Service')
@section('page-title', 'Add Service')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
    <li class="breadcrumb-item active">Add</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('services.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Delivery Mode</label>
                <input type="text" name="deliveryMode" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Target Groups (comma separated)</label>
                <input type="text" name="targetGroups" class="form-control">
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('services.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn btn-success">
                    Save <i class="fas fa-check ml-1"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
