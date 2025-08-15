@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="display-4 mb-1">Students</h1>
            <p class="text-muted">Manage student records and information</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-person-plus me-2"></i>Add New Student
        </a>
    </div>

    @if($students->count() > 0)
        <div class="row g-4">
            @foreach($students as $student)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill text-white fs-4"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">{{ $student->fname }} {{ $student->lname }}</h5>
                                <p class="text-muted small mb-0">{{ $student->email }}</p>
                            </div>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="btn-group w-100" role="group" aria-label="Student actions">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye me-1"></i>View
                                </a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;" class="flex-fill">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirmDelete('Are you sure you want to delete {{ $student->fname }} {{ $student->lname }}?')">
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted small">
                        <i class="bi bi-calendar3 me-1"></i>Added {{ $student->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            <div class="alert alert-light">
                <i class="bi bi-info-circle me-2"></i>
                Showing {{ $students->count() }} student{{ $students->count() !== 1 ? 's' : '' }}
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-people display-1 text-muted"></i>
            </div>
            <h3 class="text-muted">No Students Found</h3>
            <p class="text-muted mb-4">Get started by adding your first student to the system.</p>
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-person-plus me-2"></i>Add Your First Student
            </a>
        </div>
    @endif
@endsection
