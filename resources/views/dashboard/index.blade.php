@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <!-- Programs Card -->
    <div class="col-lg-3 col-6">
        <div class="card card-dashboard" style="background: linear-gradient(135deg, var(--accent-blue) 0%, #2980b9 100%); color: var(--text-white);">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ count(\App\Data\FakeProgramRepository::all()) }}</h3>
                    <p>Programs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram fa-3x"></i>
                </div>
            </div>
            <a href="{{ route('programs.index') }}" class="card-footer text-white text-decoration-none">
                Manage Programs <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Projects Card -->
    <div class="col-lg-3 col-6">
        <div class="card card-dashboard" style="background: linear-gradient(135deg, var(--accent-success) 0%, #219a52 100%); color: var(--text-white);">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3>0</h3>
                    <p>Projects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks fa-3x"></i>
                </div>
            </div>
            <a href="#" class="card-footer text-white text-decoration-none">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Participants Card -->
    <div class="col-lg-3 col-6">
        <div class="card card-dashboard" style="background: linear-gradient(135deg, var(--accent-warning) 0%, #e67e22 100%); color: var(--text-white);">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3>0</h3>
                    <p>Participants</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users fa-3x"></i>
                </div>
            </div>
            <a href="#" class="card-footer text-white text-decoration-none">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Outcomes Card -->
    <div class="col-lg-3 col-6">
        <div class="card card-dashboard" style="background: linear-gradient(135deg, var(--accent-danger) 0%, #c0392b 100%); color: var(--text-white);">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3>0</h3>
                    <p>Outcomes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line fa-3x"></i>
                </div>
            </div>
            <a href="#" class="card-footer text-white text-decoration-none">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Facilities Card -->
    <div class="col-lg-3 col-6">
        <div class="card card-dashboard" style="background: linear-gradient(135deg, var(--accent-info) 0%, #16a085 100%) !important; color: var(--text-white);">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ count(\App\Data\FakeFacilityRepository::all()) }}</h3>
                    <p>Facilities</p>
                </div>
                <div class="icon">
                    <i class="fas fa-building fa-3x"></i>
                </div>
            </div>
            <a href="{{ route('facilities.index') }}" class="card-footer text-white text-decoration-none">
                Manage Facilities <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Services Card -->
    <div class="col-lg-3 col-6">
        <div class="card card-dashboard" style="background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%); color: var(--text-white);">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ count(\App\Data\FakeServiceRepository::all()) }}</h3>
                    <p>Services</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cogs fa-3x"></i>
                </div>
            </div>
            <a href="{{ route('services.index') }}" class="card-footer text-white text-decoration-none">
                Manage Services <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection
