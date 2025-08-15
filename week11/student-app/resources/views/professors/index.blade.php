@extends('layouts.admin')

@section('title', 'Professors')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0">
                        <i class="bi bi-person-workspace me-2"></i>
                        Professors
                    </h1>
                    <p class="text-muted mb-0">Manage your professors database</p>
                </div>
                <a href="{{ route('professors.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Add New Professor
                </a>
            </div>

            @if($professors->count() > 0)
                <div class="row g-4">
                    @foreach($professors as $professor)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="flex-grow-1">
                                            <h5 class="card-title mb-1">
                                                {{ $professor->name }}
                                            </h5>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar me-1"></i>
                                                Added {{ $professor->created_at->format('M j, Y') }}
                                            </small>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('professors.show', $professor) }}">
                                                        <i class="bi bi-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('professors.edit', $professor) }}">
                                                        <i class="bi bi-pencil me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('professors.destroy', $professor) }}" method="POST" 
                                                          onsubmit="return confirm('Are you sure you want to delete this professor?')" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="bi bi-trash me-2"></i>Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 mt-auto">
                                        <a href="{{ route('professors.show', $professor) }}" class="btn btn-outline-primary btn-sm flex-fill">
                                            <i class="bi bi-eye me-1"></i>View
                                        </a>
                                        <a href="{{ route('professors.edit', $professor) }}" class="btn btn-outline-secondary btn-sm flex-fill">
                                            <i class="bi bi-pencil me-1"></i>Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($professors->hasPages())
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $professors->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-person-workspace display-1 text-muted"></i>
                    </div>
                    <h3 class="text-muted">No professors found</h3>
                    <p class="text-muted mb-4">Get started by adding your first professor to the database.</p>
                    <a href="{{ route('professors.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>
                        Add First Professor
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
