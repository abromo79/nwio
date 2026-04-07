@extends('layouts.admin')

@section('content')
<h1>Manage Research</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.research.store') }}" enctype="multipart/form-data" class="row g-2">
        @csrf
        <div class="col-md-3"><input class="form-control" name="title" placeholder="Title" required></div>
        <div class="col-md-5"><input class="form-control" name="description" placeholder="Description" required></div>
        <div class="col-md-3"><input class="form-control" type="file" name="file"></div>
        <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Title</th><th>Description</th><th>File</th><th>Actions</th></tr></thead>
    <tbody>@foreach($research as $item)<tr><td>{{ $item->title }}</td><td>{{ $item->description }}</td><td>{{ $item->file }}</td><td class="d-flex gap-2">
        <form method="POST" action="{{ route('admin.research.update', $item->id) }}" enctype="multipart/form-data" class="d-flex gap-2">@csrf @method('PUT')
            <input name="title" value="{{ $item->title }}" class="form-control form-control-sm">
            <input name="description" value="{{ $item->description }}" class="form-control form-control-sm">
            <input type="file" name="file" class="form-control form-control-sm">
            <button class="btn btn-sm btn-success">Update</button>
        </form>
        <form method="POST" action="{{ route('admin.research.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
    </td></tr>@endforeach</tbody>
</table></div>
@endsection
