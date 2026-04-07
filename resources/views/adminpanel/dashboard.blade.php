@extends('layouts.admin')

@section('content')
<h1>Dashboard</h1>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Total Programs</h6><h3>{{ $stats['programs'] }}</h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Total Projects</h6><h3>{{ $stats['projects'] }}</h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Total News & Events</h6><h3>{{ $stats['news_events'] }}</h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><h6>Total Team Members</h6><h3>{{ $stats['team'] }}</h3></div></div></div>
</div>
<div class="row g-3">
    <div class="col-md-6">
        <h5>Recent Projects</h5>
        <ul class="list-group">@foreach($recentProjects as $item)<li class="list-group-item">{{ $item->title }}</li>@endforeach</ul>
    </div>
    <div class="col-md-6">
        <h5>Recent News</h5>
        <ul class="list-group">@foreach($recentNews as $item)<li class="list-group-item">{{ $item->title }}</li>@endforeach</ul>
    </div>
</div>
@endsection
