@extends('layouts.admin')

@section('title', 'Manage Programs')

@section('content')

<div class="fade-in-up">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Manage Programs</h1>
            <p class="text-muted mb-0">Create and manage marine conservation programs</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addProgramModal">
                <i class="bi bi-plus-circle"></i>
                Add Program
            </button>
        </div>
    </div>

    <!-- Programs Table -->
    <div class="admin-table">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Objectives</th>
                        <th>Image</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->name }}</strong>
                                <br>
                                <small class="text-muted">Slug: {{ $item->slug }}</small>
                            </td>
                            <td>{{ Str::limit($item->description, 100) }}</td>
                            <td>{{ Str::limit($item->objectives, 80) }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td>
                                <small>{{ $item->created_at ?? 'N/A' }}</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#editProgramModal{{ $item->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form method="POST" action="{{ route('admin.programs.destroy', $item->id) }}" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-admin btn-admin-danger" onclick="return confirm('Are you sure you want to delete this program?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <p class="text-muted mt-2">No programs found</p>
                                <button class="btn btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addProgramModal">
                                    <i class="bi bi-plus-circle"></i>
                                    Add First Program
                                </button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Program Modal -->
<div class="modal fade" id="addProgramModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.programs.store') }}" enctype="multipart/form-data" class="admin-form">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Program Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Objectives</label>
                        <textarea class="form-control" name="objectives" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Maximum file size: 2MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-admin btn-admin-primary">
                        <i class="bi bi-check-circle"></i>
                        Create Program
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Program Modals -->
@foreach($programs as $item)
<div class="modal fade" id="editProgramModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.programs.update', $item->id) }}" enctype="multipart/form-data" class="admin-form">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Program Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4" required>{{ $item->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Objectives</label>
                        <textarea class="form-control" name="objectives" rows="3" required>{{ $item->objectives }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">Leave empty to keep current image. Maximum file size: 2MB</small>
                        @if($item->image)
                            <div class="mt-2">
                                <small>Current image:</small><br>
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width: 100px; height: 100px; object-fit: cover;" class="rounded">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-admin btn-admin-primary">
                        <i class="bi bi-check-circle"></i>
                        Update Program
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
