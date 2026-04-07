@extends('layouts.admin')

@section('content')
<h1>Manage Projects</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-2">
            <div class="col-md-2"><select class="form-select" name="program_id">@foreach($programs as $p)<option value="{{ $p->id }}">{{ $p->name }}</option>@endforeach</select></div>
            <div class="col-md-2"><input class="form-control" name="title" placeholder="Title" required></div>
            <div class="col-md-2"><input class="form-control" name="location" placeholder="Location" required></div>
            <div class="col-md-2"><input class="form-control" type="date" name="start_date" required></div>
            <div class="col-md-2"><input class="form-control" type="date" name="end_date"></div>
            <div class="col-md-1"><select class="form-select" name="status"><option>ongoing</option><option>completed</option></select></div>
            <div class="col-md-1"><input type="file" class="form-control" name="image"></div>
            <div class="col-md-11"><input class="form-control" name="description" placeholder="Description" required></div>
            <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
        </div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Title</th><th>Program</th><th>Location</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>@foreach($projects as $item)<tr><td>{{ $item->title }}</td><td>{{ $item->program_name }}</td><td>{{ $item->location }}</td><td>{{ $item->status }}</td><td>
        <form method="POST" action="{{ route('admin.projects.update', $item->id) }}" enctype="multipart/form-data" class="d-flex gap-2 mb-1">@csrf @method('PUT')
            <select class="form-select form-select-sm" name="program_id">@foreach($programs as $p)<option value="{{ $p->id }}" @selected($p->id === $item->program_id)>{{ $p->name }}</option>@endforeach</select>
            <input name="title" value="{{ $item->title }}" class="form-control form-control-sm">
            <input name="location" value="{{ $item->location }}" class="form-control form-control-sm">
            <input name="start_date" type="date" value="{{ $item->start_date }}" class="form-control form-control-sm">
            <input name="end_date" type="date" value="{{ $item->end_date }}" class="form-control form-control-sm">
            <select name="status" class="form-select form-select-sm"><option @selected($item->status === 'ongoing')>ongoing</option><option @selected($item->status === 'completed')>completed</option></select>
            <input name="description" value="{{ $item->description }}" class="form-control form-control-sm">
            <input type="file" name="image" class="form-control form-control-sm">
            <button class="btn btn-sm btn-success">Update</button>
        </form>
        <form method="POST" action="{{ route('admin.projects.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
    </td></tr>@endforeach</tbody>
</table></div>
@endsection
