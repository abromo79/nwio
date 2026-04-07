@extends('layouts.website')

@section('content')
<h1>Our Team</h1>
<div class="row g-3">
    @foreach($team as $member)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <img src="{{ $member->photo }}" width="42" alt="{{ $member->name }}">
                    <h5 class="mt-2">{{ $member->name }}</h5>
                    <p class="mb-1"><strong>{{ $member->position }}</strong></p>
                    <small class="text-muted">{{ $member->department }}</small>
                    <p class="mt-2">{{ $member->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
