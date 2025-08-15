@extends('layouts.admin')

@section('title', 'Edit Professor')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-pencil me-2"></i>
                            Edit Professor
                        </h4>
                        <div class="btn-group">
                            <a href="{{ route('professors.index') }}" class="btn btn-secondary btn-sm">
                                <i class="bi bi-arrow-left me-1"></i>
                                Back to List
                            </a>
                            <a href="{{ route('professors.show', $professor) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye me-1"></i>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('professors.update', $professor) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-person me-1"></i>
                                Professor Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $professor->name) }}" 
                                   placeholder="Enter professor's full name (e.g., Dr. John Smith)"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                Enter the complete name including title (Dr., Prof., etc.)
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('professors.show', $professor) }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-x-circle me-1"></i>
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-check-circle me-1"></i>
                                Update Professor
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light">
                    <div class="small text-muted">
                        <div class="row">
                            <div class="col-sm-6">
                                <i class="bi bi-calendar-plus me-1"></i>
                                <strong>Created:</strong> {{ $professor->created_at->format('M j, Y g:i A') }}
                            </div>
                            <div class="col-sm-6">
                                <i class="bi bi-calendar-check me-1"></i>
                                <strong>Last Updated:</strong> {{ $professor->updated_at->format('M j, Y g:i A') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
