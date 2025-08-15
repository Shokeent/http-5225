@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                View all Students
            </h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
        </div>
    </div>
    <div class="row">
        @forelse($students as $student)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                    <p class="card-text">{{ $student->email }}</p>
                    <a href="{{ route('students.show', $student->id) }}" class="card-link">View</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="card-link">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this student?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0 card-link" style="color: #dc3545; text-decoration: none;">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <div class="alert alert-info">
                No students found. <a href="{{ route('students.create') }}">Add your first student</a>
            </div>
        </div>
        @endforelse
    </div>
@endsection
