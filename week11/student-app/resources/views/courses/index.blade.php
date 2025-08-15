@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="display-4 mb-1">Courses</h1>
            <p class="text-muted">Manage course catalog and information</p>
        </div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-journal-plus me-2"></i>Add New Course
        </a>
    </div>

    @if($courses->count() > 0)
        <div class="row g-4">
            @foreach($courses as $course)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="bi bi-book-fill text-white fs-4"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-1">{{ $course->name }}</h5>
                                <small class="text-muted">Course ID: #{{ str_pad($course->id, 3, '0', STR_PAD_LEFT) }}</small>
                            </div>
                        </div>
                        
                        <p class="card-text text-muted mb-3">
                            {{ Str::limit($course->description, 100) }}
                        </p>
                        
                        <div class="mt-auto">
                            <div class="btn-group w-100" role="group" aria-label="Course actions">
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye me-1"></i>View
                                </a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;" class="flex-fill">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirmDelete('Are you sure you want to delete {{ $course->name }}?')">
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted small">
                        <i class="bi bi-calendar3 me-1"></i>Added {{ $course->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            <div class="alert alert-light">
                <i class="bi bi-info-circle me-2"></i>
                Showing {{ $courses->count() }} course{{ $courses->count() !== 1 ? 's' : '' }}
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-book display-1 text-muted"></i>
            </div>
            <h3 class="text-muted">No Courses Found</h3>
            <p class="text-muted mb-4">Get started by adding your first course to the catalog.</p>
            <a href="{{ route('courses.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-journal-plus me-2"></i>Add Your First Course
            </a>
        </div>
    @endif
@endsection
