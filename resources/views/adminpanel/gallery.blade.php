@extends('layouts.admin')

@section('content')
<h1>Manage Gallery</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="row g-2">
        @csrf
        <div class="col-md-2"><select class="form-select" name="type"><option>photo</option><option>video</option></select></div>
        <div class="col-md-5"><input class="form-control" name="caption" placeholder="Caption"></div>
        <div class="col-md-4"><input class="form-control" type="file" name="file" required></div>
        <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>File</th><th>Type</th><th>Caption</th><th>Actions</th></tr></thead>
    <tbody>@foreach($gallery as $item)<tr><td>{{ $item->file }}</td><td>{{ $item->type }}</td><td>{{ $item->caption }}</td><td class="d-flex gap-2">
        <form method="POST" action="{{ route('admin.gallery.update', $item->id) }}" enctype="multipart/form-data" class="d-flex gap-2">@csrf @method('PUT')
            <select class="form-select form-select-sm" name="type"><option @selected($item->type === 'photo')>photo</option><option @selected($item->type === 'video')>video</option></select>
            <input name="caption" value="{{ $item->caption }}" class="form-control form-control-sm">
            <input type="file" name="file" class="form-control form-control-sm">
            <button class="btn btn-sm btn-success">Update</button>
        </form>
        <form method="POST" action="{{ route('admin.gallery.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
    </td></tr>@endforeach</tbody>
</table></div>
@endsection
