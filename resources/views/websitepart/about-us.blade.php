@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8 slide-in-left">
            <div class="mb-4">
                <span class="badge bg-primary mb-3">About Us</span>
                <h1 class="display-4 fw-bold mb-3">About NWIO</h1>
                <p class="lead mb-4">Next Wave Initiative Organization works with communities, youth, fishers, researchers, and institutions to protect Tanzania's ocean resources through innovative marine conservation solutions.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                        <i class="bi bi-hand-heart me-2"></i>Join Our Mission
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                        <i class="bi bi-envelope me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ asset('images/about-hero.svg') }}" class="img-fluid rounded-3 shadow-lg" alt="NWIO team working with communities">
            </div>
        </div>
    </div>
</div>

<!-- Vision & Mission Section -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Our Foundation</h2>
        <p class="text-muted">The core principles that guide our marine conservation efforts</p>
    </div>
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100 vision-card border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-eye text-primary fs-3"></i>
                        </div>
                        <h3 class="card-title mb-0">Our Vision</h3>
                    </div>
                    <p class="card-text fs-5">{{ $about['vision'][0]->content ?? '' }}</p>
                    <div class="mt-3">
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: 85%"></div>
                        </div>
                        <small class="text-muted">85% Progress Towards Vision</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100 mission-card border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-success bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-compass text-success fs-3"></i>
                        </div>
                        <h3 class="card-title mb-0">Our Mission</h3>
                    </div>
                    <p class="card-text fs-5">{{ $about['mission'][0]->content ?? '' }}</p>
                    <div class="mt-3">
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 75%"></div>
                        </div>
                        <small class="text-muted">75% Mission Implementation</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Goals Section -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Strategic Goals</h2>
        <p class="text-muted">Our key objectives for marine conservation and community development</p>
    </div>
    <div class="row g-4">
        @foreach(($about['goal'] ?? []) as $index => $goal)
            <div class="col-md-6">
                <div class="goal-item bg-white rounded-3 p-4 shadow-sm border-start border-4 border-primary">
                    <div class="d-flex align-items-start">
                        <div class="goal-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; min-width: 40px;">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="mb-2">Strategic Goal {{ $index + 1 }}</h5>
                            <p class="mb-0">{{ $goal->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Core Values Section -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Core Values</h2>
        <p class="text-muted">The principles that guide our daily work and decision-making</p>
    </div>
    <div class="row g-4">
        @foreach(($about['core_value'] ?? []) as $index => $value)
            <div class="col-md-6 col-lg-4">
                <div class="value-card text-center p-4 rounded-3 bg-white shadow-sm h-100">
                    <div class="value-icon bg-gradient bg-opacity-10 rounded-circle p-3 mb-3 mx-auto" style="width: 80px; height: 80px;">
                        <i class="bi {{ ['bi-heart', 'bi-shield-check', 'bi-people', 'bi-globe', 'bi-lightbulb', 'bi-award'][$index % 6] }} text-primary fs-2"></i>
                    </div>
                    <h5 class="mb-3">{{ Str::title(str_replace('-', ' ', $value->title ?? 'Value ' . ($index + 1))) }}</h5>
                    <p class="text-muted">{{ $value->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Impact Statistics -->
<section class="mb-5">
    <div class="impact-section">
        <div class="text-center mb-4">
            <h2 class="display-5 fw-bold text-white">Our Impact</h2>
            <p class="text-white-50">Making a measurable difference in marine conservation</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">500+</div>
                    <div class="text-white-50">Communities Engaged</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">50+</div>
                    <div class="text-white-50">Marine Species Protected</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">1000+</div>
                    <div class="text-white-50">Youth Trained</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">25+</div>
                    <div class="text-white-50">Research Projects</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="mb-5">
    <div class="text-center p-5 bg-light rounded-3">
        <h2 class="display-5 fw-bold mb-3">Join Our Mission</h2>
        <p class="lead mb-4">Together, we can protect Tanzania's marine heritage for future generations</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                <i class="bi bi-person-plus me-2"></i>Get Involved
            </a>
            <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                <i class="bi bi-chat-dots me-2"></i>Learn More
            </a>
        </div>
    </div>
</section>
@endsection
