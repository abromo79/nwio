@extends('layouts.website')

@section('content')

<!-- Team Hero Section -->
<div class="team-hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-md-8">
            <div class="mb-4">
                <h1 class="display-4 fw-bold mb-3">Our Team</h1>
                <p class="lead mb-4">Meet the dedicated professionals working together to empower coastal communities in Tanzania through marine conservation and sustainable blue economy solutions.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="team-hero-icon">
                <i class="bi bi-people-fill display-1 text-primary"></i>
            </div>
        </div>
    </div>
</div>

<!-- Organization Structure Section -->
<div class="org-structure-section mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Organization Structure</h2>
        <p class="text-muted">Our organizational framework designed for effective marine conservation impact</p>
    </div>
    <div class="org-structure-container card border-0 shadow-lg">
        <div class="card-body p-4">
            <div class="text-center">
                <img src="{{ asset('images/org.png') }}" alt="NWIO Organization Structure" class="img-fluid rounded-3" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

<!-- Team Members Section -->
<div class="team-members-section mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Meet Our Team Members</h2>
        <p class="text-muted">The passionate individuals driving our marine conservation mission</p>
    </div>
    <div class="row g-3">
        @foreach($team as $member)
            <div class="col-md-4">
                <div class="team-member-card card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="member-photo mb-3">
                            <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                        <h5 class="card-title fw-bold">{{ $member->name }}</h5>
                        <p class="text-primary fw-bold mb-1">{{ $member->position }}</p>
                        <small class="text-muted d-block mb-2">{{ $member->department }}</small>
                        <p class="card-text small">{{ $member->description }}</p>
                        <div class="member-contact">
                            <a href="#" class="text-primary me-2"><i class="bi bi-envelope"></i></a>
                            <a href="#" class="text-primary me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
