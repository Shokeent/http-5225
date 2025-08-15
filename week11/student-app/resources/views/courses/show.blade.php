@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-book-fill fs-4 me-3"></i>
                        <div>
                            <h4 class="mb-1">Course Details</h4>
                            <small>View course information and details</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="mb-3">{{ $course->name }}</h2>
                            
                            <div class="mb-4">
                                <h5 class="text-muted mb-2">Course Description</h5>
                                <p class="lead">{{ $course->description }}</p>
                            </div>
                            
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-muted">Course ID:</td>
                                        <td>#{{ str_pad($course->id, 3, '0', STR_PAD_LEFT) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Date Created:</td>
                                        <td>{{ $course->created_at->format('F j, Y \a\t g:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Last Updated:</td>
                                        <td>{{ $course->updated_at->diffForHumans() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="bg-light rounded-3 p-4">
                                <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="bi bi-book-fill text-white" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="mb-1">{{ $course->name }}</h5>
                                <small class="text-muted">Course</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex gap-2">
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit Course
                        </a>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Back to Courses
                        </a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;" class="ms-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirmDelete('Are you sure you want to delete {{ $course->name }}? This action cannot be undone.')">
                                <i class="bi bi-trash me-2"></i>Delete Course
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
