@extends('layouts.admin')

@section('content')
<h1>Users Management</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.users.store') }}" class="row g-2">
        @csrf
        <div class="col-md-3"><input class="form-control" name="name" placeholder="Name" required></div>
        <div class="col-md-3"><input class="form-control" name="email" type="email" placeholder="Email" required></div>
        <div class="col-md-3"><input class="form-control" name="password" type="password" placeholder="Password" required></div>
        <div class="col-md-2"><select class="form-select" name="role"><option>admin</option><option>editor</option><option>staff</option></select></div>
        <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr></thead>
    <tbody>@foreach($users as $item)<tr><td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->role }}</td><td class="d-flex gap-2">
        <form method="POST" action="{{ route('admin.users.update', $item->id) }}" class="d-flex gap-2">@csrf @method('PUT')
            <input name="name" value="{{ $item->name }}" class="form-control form-control-sm">
            <input name="email" value="{{ $item->email }}" class="form-control form-control-sm">
            <input name="password" type="password" placeholder="New password (optional)" class="form-control form-control-sm">
            <select name="role" class="form-select form-select-sm"><option @selected($item->role === 'admin')>admin</option><option @selected($item->role === 'editor')>editor</option><option @selected($item->role === 'staff')>staff</option></select>
            <button class="btn btn-sm btn-success">Update</button>
        </form>
        <form method="POST" action="{{ route('admin.users.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
    </td></tr>@endforeach</tbody>
</table></div>
@endsection
