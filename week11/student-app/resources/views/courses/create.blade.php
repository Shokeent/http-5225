@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-journal-plus fs-4 me-3"></i>
                        <div>
                            <h4 class="mb-1">Add New Course</h4>
                            <small>Create a new course for the catalog</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('courses.store') }}" method="post" id="createCourseForm">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h6 class="mb-2"><i class="bi bi-exclamation-triangle me-2"></i>Please fix the following errors:</h6>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-journal-text me-1"></i>Course Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter course name" aria-describedby="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <i class="bi bi-card-text me-1"></i>Course Description <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Enter course description (minimum 10 characters)" aria-describedby="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Provide a detailed description of the course content and objectives.</div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex gap-2">
                        <button type="submit" form="createCourseForm" class="btn btn-success">
                            <i class="bi bi-check-lg me-2"></i>Create Course
                        </button>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-lg me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
