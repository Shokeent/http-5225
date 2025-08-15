@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-plus fs-4 me-3"></i>
                        <div>
                            <h4 class="mb-1">Add New Student</h4>
                            <small>Create a new student profile</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="post" id="createStudentForm">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fname" class="form-label">
                                        <i class="bi bi-person me-1"></i>First Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}" placeholder="Enter first name" aria-describedby="fname">
                                    @error('fname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lname" class="form-label">
                                        <i class="bi bi-person me-1"></i>Last Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}" placeholder="Enter last name" aria-describedby="lname">
                                    @error('lname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-1"></i>Email Address <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" aria-describedby="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="courses" class="form-label">
                                <i class="bi bi-book me-1"></i>Select Courses (Optional)
                            </label>
                            <select class="form-select @error('courses') is-invalid @enderror" name="courses[]" id="courses" multiple>
                                <option value="">Select courses...</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ in_array($course->id, old('courses', [])) ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('courses')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                Hold Ctrl (Windows) or Cmd (Mac) to select multiple courses
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex gap-2">
                        <button type="submit" form="createStudentForm" class="btn btn-success">
                            <i class="bi bi-check-lg me-2"></i>Create Student
                        </button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-lg me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
