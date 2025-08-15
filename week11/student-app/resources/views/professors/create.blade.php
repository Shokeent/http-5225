@extends('layouts.admin')

@section('title', 'Add New Professor')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-plus-circle me-2"></i>
                            Add New Professor
                        </h4>
                        <a href="{{ route('professors.index') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back to Professors
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('professors.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-person me-1"></i>
                                Professor Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
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
                            <a href="{{ route('professors.index') }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-x-circle me-1"></i>
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>
                                Create Professor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
