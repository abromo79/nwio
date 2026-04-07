@extends('layouts.admin')

@section('content')
<h1>Manage Events</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" class="row g-2">
        @csrf
        <div class="col-md-3"><input class="form-control" name="title" placeholder="Title" required></div>
        <div class="col-md-3"><input class="form-control" name="description" placeholder="Description" required></div>
        <div class="col-md-2"><input class="form-control" name="location" placeholder="Location" required></div>
        <div class="col-md-2"><input class="form-control" type="date" name="event_date" required></div>
        <div class="col-md-1"><input class="form-control" type="file" name="image"></div>
        <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Title</th><th>Date</th><th>Location</th><th>Actions</th></tr></thead>
    <tbody>@foreach($events as $item)<tr><td>{{ $item->title }}</td><td>{{ $item->event_date }}</td><td>{{ $item->location }}</td><td class="d-flex gap-2">
        <form method="POST" action="{{ route('admin.events.update', $item->id) }}" enctype="multipart/form-data" class="d-flex gap-2">@csrf @method('PUT')
            <input name="title" value="{{ $item->title }}" class="form-control form-control-sm">
            <input type="date" name="event_date" value="{{ $item->event_date }}" class="form-control form-control-sm">
            <input name="location" value="{{ $item->location }}" class="form-control form-control-sm">
            <input name="description" value="{{ $item->description }}" class="form-control form-control-sm">
            <input type="file" name="image" class="form-control form-control-sm">
            <button class="btn btn-sm btn-success">Update</button>
        </form>
        <form method="POST" action="{{ route('admin.events.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
    </td></tr>@endforeach</tbody>
</table></div>
@endsection
