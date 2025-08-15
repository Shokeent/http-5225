@extends('layouts.admin')

@section('title', 'Professor Details')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-person-workspace me-2"></i>
                            Professor Details
                        </h4>
                        <div class="btn-group">
                            <a href="{{ route('professors.index') }}" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-left me-1"></i>
                                Back to List
                            </a>
                            <a href="{{ route('professors.edit', $professor) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil me-1"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-section">
                                <div class="text-center mb-4">
                                    <div class="avatar-placeholder bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" 
                                         style="width: 80px; height: 80px; font-size: 2rem;">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>
                                    <h2 class="mt-3 mb-1">{{ $professor->name }}</h2>
                                    <p class="text-muted">Professor</p>
                                </div>

                                <div class="info-grid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="info-item p-3 bg-light rounded">
                                                <label class="form-label text-muted small mb-1">
                                                    <i class="bi bi-person me-1"></i>
                                                    Full Name
                                                </label>
                                                <div class="fw-medium">{{ $professor->name }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="info-item p-3 bg-light rounded">
                                                <label class="form-label text-muted small mb-1">
                                                    <i class="bi bi-hash me-1"></i>
                                                    Professor ID
                                                </label>
                                                <div class="fw-medium">#{{ $professor->id }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="info-item p-3 bg-light rounded">
                                                <label class="form-label text-muted small mb-1">
                                                    <i class="bi bi-calendar-plus me-1"></i>
                                                    Added Date
                                                </label>
                                                <div class="fw-medium">
                                                    {{ $professor->created_at->format('F j, Y') }}
                                                    <small class="text-muted">({{ $professor->created_at->diffForHumans() }})</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="info-item p-3 bg-light rounded">
                                                <label class="form-label text-muted small mb-1">
                                                    <i class="bi bi-calendar-check me-1"></i>
                                                    Last Updated
                                                </label>
                                                <div class="fw-medium">
                                                    {{ $professor->updated_at->format('F j, Y') }}
                                                    <small class="text-muted">({{ $professor->updated_at->diffForHumans() }})</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light">
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('professors.edit', $professor) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-1"></i>
                            Edit Professor
                        </a>
                        <form action="{{ route('professors.destroy', $professor) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this professor? This action cannot be undone.')" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash me-1"></i>
                                Delete Professor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
