@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                Student Profile
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                    <p class="card-text"><small class="text-muted">Created: {{ $student->created_at->format('M d, Y') }}</small></p>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this student?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
