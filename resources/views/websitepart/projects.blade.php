@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8 slide-in-left">
            <div class="mb-4">
                <span class="badge bg-primary mb-3">{{ ucfirst($status) }} Projects</span>
                <h1 class="display-4 fw-bold mb-3">{{ ucfirst($status) }} Marine Conservation Projects</h1>
                <p class="lead mb-4">Discover our active initiatives protecting Tanzania's marine ecosystems and supporting coastal communities.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                        <i class="bi bi-hand-heart me-2"></i>Support Our Work
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                        <i class="bi bi-envelope me-2"></i>Partner With Us
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ asset('images/images.jpeg') }}" class="img-fluid rounded-3 shadow-lg" alt="Marine conservation projects">
            </div>
        </div>
    </div>
</div>

<!-- Filter Section -->
<section class="mb-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Filter by Program</label>
                            <select class="form-select">
                                <option value="">All Programs</option>
                                <option value="marine-conservation">Marine Conservation</option>
                                <option value="sustainable-fisheries">Sustainable Fisheries</option>
                                <option value="seaweed-aquaculture">Seaweed Aquaculture</option>
                                <option value="ocean-education">Ocean Education</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Filter by Location</label>
                            <select class="form-select">
                                <option value="">All Locations</option>
                                <option value="dar-es-salaam">Dar es Salaam</option>
                                <option value="zanzibar">Zanzibar</option>
                                <option value="tanga">Tanga</option>
                                <option value="pemba">Pemba</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Sort By</label>
                            <select class="form-select">
                                <option value="recent">Most Recent</option>
                                <option value="name">Project Name</option>
                                <option value="progress">Progress</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6 class="fw-bold mb-3">Quick Stats</h6>
                    <div class="row g-2 text-center">
                        <div class="col-6">
                            <div class="stat-box bg-light rounded-2 p-2">
                                <div class="fw-bold text-primary">{{ count($projects) }}</div>
                                <small class="text-muted">Active Projects</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-box bg-light rounded-2 p-2">
                                <div class="fw-bold text-success">85%</div>
                                <small class="text-muted">Avg Progress</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="mb-5">
    <div class="row g-4">
        @foreach($projects as $index => $project)
            <div class="col-lg-6">
                <div class="project-card card h-100 border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="project-status">
                                @if($project->status === 'ongoing')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-warning">{{ ucfirst($project->status) }}</span>
                                @endif
                            </div>
                            <div class="project-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; min-width: 30px; font-size: 0.8rem;">
                                {{ $index + 1 }}
                            </div>
                        </div>
                        
                        <h4 class="card-title mb-3">{{ $project->title }}</h4>
                        
                        <div class="project-meta mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="meta-item">
                                        <i class="bi bi-water text-primary me-1"></i>
                                        <small class="text-muted">Program:</small>
                                        <div class="fw-semibold">{{ $project->program_name }}</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="meta-item">
                                        <i class="bi bi-geo-alt text-danger me-1"></i>
                                        <small class="text-muted">Location:</small>
                                        <div class="fw-semibold">{{ $project->location }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-timeline mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted small">Project Timeline</span>
                                <span class="badge bg-light text-dark">{{ $project->start_date }} - {{ $project->end_date ?? 'Present' }}</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                @if($project->status === 'ongoing')
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 75%"></div>
                                @else
                                    <div class="progress-bar bg-warning" style="width: 100%"></div>
                                @endif
                            </div>
                        </div>

                        <div class="project-description mb-3">
                            <p class="text-muted mb-0">This marine conservation initiative focuses on protecting critical habitats and engaging local communities in sustainable resource management practices.</p>
                        </div>

                        <div class="project-actions">
                            <div class="d-flex gap-2">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="bi bi-eye me-1"></i>View Details
                                </a>
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('website.get-involved') }}">
                                    <i class="bi bi-heart me-1"></i>Support
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Load More -->
<section class="text-center mb-5">
    <button class="btn btn-outline-primary btn-lg">
        <i class="bi bi-arrow-clockwise me-2"></i>Load More Projects
    </button>
</section>

<!-- Call to Action -->
<section class="mb-5">
    <div class="impact-section text-center">
        <h2 class="display-5 fw-bold text-white mb-3">Support Our Ongoing Projects</h2>
        <p class="text-white-50 mb-4">Your contribution helps us protect Tanzania's marine heritage and support coastal communities</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a class="btn btn-light btn-lg" href="{{ route('website.get-involved') }}">
                <i class="bi bi-person-plus me-2"></i>Volunteer
            </a>
            <a class="btn btn-outline-light btn-lg" href="{{ route('website.contact') }}">
                <i class="bi bi-currency-dollar me-2"></i>Donate
            </a>
        </div>
    </div>
</section>
@endsection
