@extends('layouts.admin')

@section('content')
<h1>Manage Programs</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.programs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-2">
            <div class="col-md-3"><input class="form-control" name="name" placeholder="Program name" required></div>
            <div class="col-md-3"><input class="form-control" name="description" placeholder="Description" required></div>
            <div class="col-md-3"><input class="form-control" name="objectives" placeholder="Objectives" required></div>
            <div class="col-md-2"><input class="form-control" type="file" name="image"></div>
            <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
        </div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Name</th><th>Description</th><th>Objectives</th><th>Actions</th></tr></thead>
    <tbody>@foreach($programs as $item)
        <tr><td>{{ $item->name }}</td><td>{{ $item->description }}</td><td>{{ $item->objectives }}</td><td class="d-flex gap-2">
            <form method="POST" action="{{ route('admin.programs.update', $item->id) }}" enctype="multipart/form-data" class="d-flex gap-2">@csrf @method('PUT')
                <input name="name" value="{{ $item->name }}" class="form-control form-control-sm">
                <input name="description" value="{{ $item->description }}" class="form-control form-control-sm">
                <input name="objectives" value="{{ $item->objectives }}" class="form-control form-control-sm">
                <input type="file" name="image" class="form-control form-control-sm">
                <button class="btn btn-sm btn-success">Update</button>
            </form>
            <form method="POST" action="{{ route('admin.programs.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
        </td></tr>
    @endforeach</tbody>
</table></div>
@endsection
