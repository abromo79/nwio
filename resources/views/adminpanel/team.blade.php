@extends('layouts.admin')

@section('content')
<h1>Manage Team</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data" class="row g-2">
        @csrf
        <div class="col-md-2"><input class="form-control" name="name" placeholder="Name" required></div>
        <div class="col-md-2"><input class="form-control" name="position" placeholder="Position" required></div>
        <div class="col-md-2"><input class="form-control" name="department" placeholder="Department" required></div>
        <div class="col-md-4"><input class="form-control" name="description" placeholder="Description" required></div>
        <div class="col-md-1"><input type="file" class="form-control" name="photo"></div>
        <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Name</th><th>Position</th><th>Department</th><th>Actions</th></tr></thead>
    <tbody>@foreach($team as $item)<tr><td>{{ $item->name }}</td><td>{{ $item->position }}</td><td>{{ $item->department }}</td><td class="d-flex gap-2">
        <form method="POST" action="{{ route('admin.team.update', $item->id) }}" enctype="multipart/form-data" class="d-flex gap-2">@csrf @method('PUT')
            <input name="name" value="{{ $item->name }}" class="form-control form-control-sm">
            <input name="position" value="{{ $item->position }}" class="form-control form-control-sm">
            <input name="department" value="{{ $item->department }}" class="form-control form-control-sm">
            <input name="description" value="{{ $item->description }}" class="form-control form-control-sm">
            <input type="file" name="photo" class="form-control form-control-sm">
            <button class="btn btn-sm btn-success">Update</button>
        </form>
        <form method="POST" action="{{ route('admin.team.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
    </td></tr>@endforeach</tbody>
</table></div>
@endsection
