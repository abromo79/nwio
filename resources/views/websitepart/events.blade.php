@extends('layouts.website')

@section('content')
<h1>Events</h1>
<div class="row g-3">
    @foreach($events as $item)
        <div class="col-md-6">
            <div class="card h-100">
                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->title }}">
                <div class="card-body">
                    <h5>{{ $item->title }}</h5>
                    <small>{{ $item->event_date }} | {{ $item->location }}</small>
                    <p class="mt-2">{{ $item->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
