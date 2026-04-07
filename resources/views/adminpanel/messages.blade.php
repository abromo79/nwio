@extends('layouts.admin')

@section('content')
<h1>Contact Messages</h1>
<div class="table-responsive"><table class="table table-striped bg-white">
    <thead><tr><th>Name</th><th>Email</th><th>Message</th><th>Action</th></tr></thead>
    <tbody>@foreach($messages as $item)<tr><td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->message }}</td><td><form method="POST" action="{{ route('admin.messages.destroy', $item->id) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form></td></tr>@endforeach</tbody>
</table></div>
@endsection
