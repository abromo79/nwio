@extends('layouts.website')

@section('content')
<h1>Gallery</h1>
<div class="row g-3">
    @foreach($gallery as $item)
        <div class="col-md-4">
            <div class="card h-100">
                @if($item->type === 'photo')
                    <img src="{{ $item->file }}" class="card-img-top" alt="{{ $item->caption }}">
                @else
                    <div class="card-body">Video: {{ $item->file }}</div>
                @endif
                <div class="card-body"><small>{{ $item->caption }}</small></div>
            </div>
        </div>
    @endforeach
</div>
@endsection
