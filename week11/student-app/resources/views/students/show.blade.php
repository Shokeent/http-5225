@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-fill fs-4 me-3"></i>
                        <div>
                            <h4 class="mb-1">Student Profile</h4>
                            <small>View student details and information</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-muted">Full Name:</td>
                                        <td>{{ $student->fname }} {{ $student->lname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Email:</td>
                                        <td>
                                            <a href="mailto:{{ $student->email }}" class="text-decoration-none">
                                                {{ $student->email }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Student ID:</td>
                                        <td>#{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Date Added:</td>
                                        <td>{{ $student->created_at->format('F j, Y \a\t g:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Last Updated:</td>
                                        <td>{{ $student->updated_at->diffForHumans() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="bg-light rounded-3 p-4">
                                <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="bi bi-person-fill text-white" style="font-size: 2rem;"></i>
                                </div>
                                <h5 class="mb-1">{{ $student->fname }} {{ $student->lname }}</h5>
                                <small class="text-muted">Student</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex gap-2">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i>Edit Student
                        </a>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Back to Students
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;" class="ms-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirmDelete('Are you sure you want to delete {{ $student->fname }} {{ $student->lname }}? This action cannot be undone.')">
                                <i class="bi bi-trash me-2"></i>Delete Student
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
