@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-md-7 slide-in-left">
            <div class="mb-4">
                <h1 class="display-3 fw-bold mb-3">Next Wave Initiative <br>Organization (NWIO)</h1>
                <p class="lead mb-4">Empowering coastal communities in Tanzania through marine conservation, research, and sustainable blue economy solutions.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                        Get Involved <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a class="btn btn-outline-light btn-lg" href="{{ route('website.about') }}">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-5 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ asset('images/m1.jpeg') }}" class="img-fluid rounded-3 shadow-lg" alt="NWIO marine banner">
            </div>
        </div>
    </div>
</div>

<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Featured Programs</h2>
        <p class="text-muted">Discover our initiatives making a difference in marine conservation</p>
    </div>
    <div class="row g-4">
        @foreach($programs as $program)
            <div class="col-md-4">
                <div class="card h-100 program-card">
                    <div class="img-hover-zoom">
                        <img src="{{ $program->image }}" class="card-img-top" alt="{{ $program->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $program->name }}</h5>
                        <p class="card-text">{{ Str::limit($program->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <div class="text-muted">
                                <i class="bi bi-people"></i>
                                <small> {{ rand(50, 200) }} participants</small>
                            </div>
                            <a href="#" class="btn btn-primary btn-sm">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="mb-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="d-flex align-items-center mb-3">
                <i class="bi bi-newspaper text-primary me-2" style="font-size: 1.5rem;"></i>
                <h3 class="mb-0">Latest News</h3>
            </div>
            <div class="news-container">
                @foreach($news as $item)
                    <div class="news-item">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="mb-1 fw-bold">{{ $item->title }}</h6>
                            <span class="badge bg-light text-dark">New</span>
                        </div>
                        <p class="text-muted small mb-2">{{ Str::limit($item->content ?? 'Latest updates from our marine conservation efforts', 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>
                                {{ $item->date }}
                            </small>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex align-items-center mb-3">
                <i class="bi bi-calendar-event text-primary me-2" style="font-size: 1.5rem;"></i>
                <h3 class="mb-0">Upcoming Events</h3>
            </div>
            <div class="events-container">
                @foreach($events as $item)
                    <div class="event-item">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="mb-1 fw-bold">{{ $item->title }}</h6>
                            <span class="badge bg-success">Live</span>
                        </div>
                        <p class="text-muted small mb-2">{{ Str::limit('Join us for this important marine conservation initiative', 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-geo-alt me-1"></i>
                                {{ $item->location }}
                            </small>
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>
                                {{ $item->event_date }}
                            </small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Impact & Achievements</h2>
        <p class="text-muted">Making a real difference in marine conservation</p>
    </div>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="text-center p-4 rounded-3 bg-light">
                <div class="display-4 fw-bold text-primary mb-2">500+</div>
                <div class="text-muted">Coastal Communities Reached</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center p-4 rounded-3 bg-light">
                <div class="display-4 fw-bold text-success mb-2">50+</div>
                <div class="text-muted">Marine Species Protected</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center p-4 rounded-3 bg-light">
                <div class="display-4 fw-bold text-info mb-2">1000+</div>
                <div class="text-muted">Youth Trained</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center p-4 rounded-3 bg-light">
                <div class="display-4 fw-bold text-warning mb-2">25+</div>
                <div class="text-muted">Research Projects</div>
            </div>
        </div>
    </div>
</section>
@endsection
