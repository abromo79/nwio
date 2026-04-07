@extends('layouts.admin')

@section('content')
<h1>Manage About</h1>
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('admin.about.store') }}">
        @csrf
        <div class="row g-2">
            <div class="col-md-3"><select class="form-select" name="type"><option>vision</option><option>mission</option><option>goal</option><option>core_value</option></select></div>
            <div class="col-md-7"><input class="form-control" name="content" placeholder="Content" required></div>
            <div class="col-md-2"><button class="btn btn-primary w-100">Add</button></div>
        </div>
    </form>
</div></div>
<table class="table table-striped bg-white">
    <thead><tr><th>Type</th><th>Content</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($about as $row)
        <tr>
            <td>{{ $row->type }}</td><td>{{ $row->content }}</td>
            <td class="d-flex gap-2">
                <form method="POST" action="{{ route('admin.about.update', $row->id) }}" class="d-flex gap-2">
                    @csrf @method('PUT')
                    <input name="type" value="{{ $row->type }}" class="form-control form-control-sm" style="width:120px">
                    <input name="content" value="{{ $row->content }}" class="form-control form-control-sm">
                    <button class="btn btn-sm btn-success">Update</button>
                </form>
                <form method="POST" action="{{ route('admin.about.destroy', $row->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
