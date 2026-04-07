@extends('layouts.admin')

@section('content')
<h1>Manage News</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="row g-2">
        @csrf
        <div class="col-md-3"><input class="form-control" name="title" placeholder="Title" required></div>
        <div class="col-md-5"><input class="form-control" name="content" placeholder="Content" required></div>
        <div class="col-md-2"><input class="form-control" type="date" name="date" required></div>
        <div class="col-md-1"><input class="form-control" type="file" name="image"></div>
        <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
    </form>
</div></div>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Title</th><th>Date</th><th>Content</th><th>Actions</th></tr></thead>
    <tbody>@foreach($news as $item)<tr><td>{{ $item->title }}</td><td>{{ $item->date }}</td><td>{{ $item->content }}</td><td class="d-flex gap-2">
        <form method="POST" action="{{ route('admin.news.update', $item->id) }}" enctype="multipart/form-data" class="d-flex gap-2">@csrf @method('PUT')
            <input name="title" value="{{ $item->title }}" class="form-control form-control-sm">
            <input type="date" name="date" value="{{ $item->date }}" class="form-control form-control-sm">
            <input name="content" value="{{ $item->content }}" class="form-control form-control-sm">
            <input type="file" name="image" class="form-control form-control-sm">
            <button class="btn btn-sm btn-success">Update</button>
        </form>
        <form method="POST" action="{{ route('admin.news.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
    </td></tr>@endforeach</tbody>
</table></div>
@endsection
