@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8 slide-in-left">
            <div class="mb-4">
                <span class="badge bg-primary mb-3">Marine Conservation Program</span>
                <h1 class="display-4 fw-bold mb-3">{{ $program->name }}</h1>
                <p class="lead mb-4">{{ $program->description }}</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                        <i class="bi bi-hand-heart me-2"></i>Join This Program
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                        <i class="bi bi-envelope me-2"></i>Learn More
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ $program->image }}" class="img-fluid rounded-3 shadow-lg" alt="{{ $program->name }}">
            </div>
        </div>
    </div>
</div>

<!-- Program Overview -->
<section class="mb-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-bullseye text-primary fs-3"></i>
                        </div>
                        <h3 class="card-title mb-0">Program Objectives</h3>
                    </div>
                    <p class="card-text fs-5">{{ $program->objectives }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-success bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-activity text-success fs-3"></i>
                        </div>
                        <h3 class="card-title mb-0">Key Activities</h3>
                    </div>
                    <div class="row g-3">
                        @foreach($activities as $index => $activity)
                            <div class="col-md-6">
                                <div class="activity-item bg-light rounded-3 p-3">
                                    <div class="d-flex align-items-start">
                                        <div class="activity-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 30px; height: 30px; min-width: 30px; font-size: 0.8rem;">
                                            {{ $index + 1 }}
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">{{ $activity }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-info bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-graph-up text-info fs-3"></i>
                        </div>
                        <h3 class="card-title mb-0">Expected Impact</h3>
                    </div>
                    <p class="card-text fs-5">Improved ecosystem health, resilient livelihoods, and stronger community participation in marine governance.</p>
                    
                    <div class="row g-3 mt-3">
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="impact-icon text-info mb-2">
                                    <i class="bi bi-tree fs-2"></i>
                                </div>
                                <h6 class="fw-bold">Ecosystem Health</h6>
                                <p class="small text-muted mb-0">Restored marine habitats and biodiversity</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="impact-icon text-success mb-2">
                                    <i class="bi bi-currency-dollar fs-2"></i>
                                </div>
                                <h6 class="fw-bold">Resilient Livelihoods</h6>
                                <p class="small text-muted mb-0">Sustainable income for coastal communities</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded-3">
                                <div class="impact-icon text-primary mb-2">
                                    <i class="bi bi-people fs-2"></i>
                                </div>
                                <h6 class="fw-bold">Community Participation</h6>
                                <p class="small text-muted mb-0">Strong engagement in marine governance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Program Stats -->
            <div class="card border-0 shadow-lg mb-4">
                <div class="card-body p-4">
                    <h4 class="mb-4">Program Statistics</h4>
                    <div class="stat-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span>Communities Reached</span>
                            <span class="fw-bold">150+</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="stat-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span>Marine Areas Protected</span>
                            <span class="fw-bold">25 km²</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="stat-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span>Youth Trained</span>
                            <span class="fw-bold">300+</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span>Research Projects</span>
                            <span class="fw-bold">12</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Get Involved -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 text-center">
                    <h4 class="mb-3">Get Involved</h4>
                    <p class="text-muted mb-4">Join our marine conservation efforts and make a difference</p>
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary" href="{{ route('website.get-involved') }}">
                            <i class="bi bi-person-plus me-2"></i>Volunteer
                        </a>
                        <a class="btn btn-outline-primary" href="{{ route('website.contact') }}">
                            <i class="bi bi-info-circle me-2"></i>Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Programs -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Related Programs</h2>
        <p class="text-muted">Explore other marine conservation initiatives</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="icon-box bg-success bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                        <i class="bi bi-tsunami text-success fs-2"></i>
                    </div>
                    <h5 class="card-title">Sustainable Fisheries</h5>
                    <p class="card-text text-muted">Promoting sustainable fishing practices</p>
                    <a href="{{ route('website.programs.show', 'sustainable-fisheries-program') }}" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="icon-box bg-info bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                        <i class="bi bi-droplet text-info fs-2"></i>
                    </div>
                    <h5 class="card-title">Seaweed Aquaculture</h5>
                    <p class="card-text text-muted">Developing sustainable seaweed farming</p>
                    <a href="{{ route('website.programs.show', 'seaweed-aquaculture-development-program') }}" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="icon-box bg-warning bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                        <i class="bi bi-mortarboard text-warning fs-2"></i>
                    </div>
                    <h5 class="card-title">Ocean Education</h5>
                    <p class="card-text text-muted">Youth leadership and education programs</p>
                    <a href="{{ route('website.programs.show', 'ocean-education-youth-leadership-program') }}" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
