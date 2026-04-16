@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')

<div class="fade-in-up">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Manage Users</h1>
            <p class="text-muted mb-0">Create and manage user accounts and permissions</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-person-plus"></i>
                Add User
            </button>
        </div>
    </div>

    <!-- Users Table -->
    <div class="admin-table">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <div>
                                        <strong>{{ $item->name }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <span class="badge bg-{{ $item->role === 'admin' ? 'danger' : ($item->role === 'editor' ? 'warning' : 'info') }}">
                                    {{ ucfirst($item->role) }}
                                </span>
                            </td>
                            <td>
                                <small>{{ $item->created_at ?? 'N/A' }}</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $item->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form method="POST" action="{{ route('admin.users.destroy', $item->id) }}" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-admin btn-admin-danger" onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="bi bi-people display-4 text-muted"></i>
                                <p class="text-muted mt-2">No users found</p>
                                <button class="btn btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="bi bi-person-plus"></i>
                                    Add First User
                                </button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.users.store') }}" class="admin-form">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        <small class="text-muted">Minimum 6 characters</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Role</label>
                        <select class="form-select" name="role" required>
                            <option value="">Select Role</option>
                            <option value="admin">Administrator</option>
                            <option value="editor">Editor</option>
                            <option value="staff">Staff</option>
                        </select>
                        <small class="text-muted">Admin: Full access | Editor: Content management | Staff: Limited access</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-admin btn-admin-primary">
                        <i class="bi bi-check-circle"></i>
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modals -->
@foreach($users as $item)
<div class="modal fade" id="editUserModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.users.update', $item->id) }}" class="admin-form">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" value="{{ $item->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password">
                        <small class="text-muted">Leave empty to keep current password. Minimum 6 characters if changed.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Role</label>
                        <select class="form-select" name="role" required>
                            <option value="admin" {{ $item->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                            <option value="editor" {{ $item->role === 'editor' ? 'selected' : '' }}>Editor</option>
                            <option value="staff" {{ $item->role === 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                        <small class="text-muted">Admin: Full access | Editor: Content management | Staff: Limited access</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-admin btn-admin-primary">
                        <i class="bi bi-check-circle"></i>
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
