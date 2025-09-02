@extends('layouts.app')

@section('title', 'Manage Equipment')
@section('page-title', 'Manage Equipment')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Equipment</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Equipment List</h3>
        <a href="{{ route('equipment.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Equipment
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Capability</th>
                    <th>Facility</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipment as $item)
                <tr>
                    <td>{{ $item->Name }}</td>
                    <td>{{ $item->Capability }}</td>
                    <td>{{ $item->facility->Name }}</td>
                    <td>
                        <a href="{{ route('equipment.show', $item->EquipmentId) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('equipment.edit', $item->EquipmentId) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('equipment.destroy', $item->EquipmentId) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
