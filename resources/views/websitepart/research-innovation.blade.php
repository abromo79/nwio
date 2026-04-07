@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8 slide-in-left">
            <div class="mb-4">
                <span class="badge bg-primary mb-3">Research & Innovation</span>
                <h1 class="display-4 fw-bold mb-3">Research & Innovation Hub</h1>
                <p class="lead mb-4">Scientific evidence and practical innovation to strengthen marine resource management and support sustainable blue economy development in Tanzania.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                        <i class="bi bi-microscope me-2"></i>Join Research
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                        <i class="bi bi-envelope me-2"></i>Collaborate
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ asset('images/m27.jpeg') }}" class="img-fluid rounded-3 shadow-lg" alt="Marine research and innovation">
            </div>
        </div>
    </div>
</div>

<!-- Research Categories -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Research Areas</h2>
        <p class="text-muted">Exploring innovative solutions for marine conservation challenges</p>
    </div>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="research-category text-center p-4 rounded-3 bg-white shadow-sm h-100">
                <div class="category-icon bg-primary bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                    <i class="bi bi-water text-primary fs-2"></i>
                </div>
                <h5 class="mb-2">Marine Ecology</h5>
                <p class="text-muted small mb-0">Studying marine ecosystems and biodiversity patterns</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="research-category text-center p-4 rounded-3 bg-white shadow-sm h-100">
                <div class="category-icon bg-success bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                    <i class="bi bi-graph-up text-success fs-2"></i>
                </div>
                <h5 class="mb-2">Climate Science</h5>
                <p class="text-muted small mb-0">Analyzing climate impacts on coastal communities</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="research-category text-center p-4 rounded-3 bg-white shadow-sm h-100">
                <div class="category-icon bg-info bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                    <i class="bi bi-currency-dollar text-info fs-2"></i>
                </div>
                <h5 class="mb-2">Blue Economy</h5>
                <p class="text-muted small mb-0">Developing sustainable ocean-based economic solutions</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="research-category text-center p-4 rounded-3 bg-white shadow-sm h-100">
                <div class="category-icon bg-warning bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                    <i class="bi bi-people text-warning fs-2"></i>
                </div>
                <h5 class="mb-2">Community Research</h5>
                <p class="text-muted small mb-0">Engaging local communities in participatory research</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Research -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Featured Research Projects</h2>
        <p class="text-muted">Latest scientific studies and innovative solutions</p>
    </div>
    <div class="row g-4">
        @foreach($research as $index => $item)
            <div class="col-lg-6">
                <div class="research-card card h-100 border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="research-status">
                                <span class="badge bg-success">Active Research</span>
                            </div>
                            <div class="research-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; min-width: 30px; font-size: 0.8rem;">
                                {{ $index + 1 }}
                            </div>
                        </div>
                        
                        <h4 class="card-title mb-3">{{ $item->title }}</h4>
                        
                        <div class="research-meta mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="meta-item">
                                        <i class="bi bi-calendar3 text-primary me-1"></i>
                                        <small class="text-muted">Published:</small>
                                        <div class="fw-semibold">{{ date('M Y', strtotime($item->created_at ?? 'now')) }}</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="meta-item">
                                        <i class="bi bi-file-earmark-text text-info me-1"></i>
                                        <small class="text-muted">Type:</small>
                                        <div class="fw-semibold">{{ $item->type ?? 'Research Paper' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="research-description mb-3">
                            <p class="text-muted mb-0">{{ $item->description }}</p>
                        </div>

                        <div class="research-impact mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-muted small me-2">Research Impact:</span>
                                <div class="progress flex-grow-1" style="height: 6px;">
                                    <div class="progress-bar bg-info" style="width: 85%"></div>
                                </div>
                            </div>
                            <small class="text-muted">High impact on marine conservation policy</small>
                        </div>

                        <div class="research-actions">
                            <div class="d-flex gap-2">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="bi bi-eye me-1"></i>View Details
                                </a>
                                <a class="btn btn-outline-primary btn-sm" href="#">
                                    <i class="bi bi-download me-1"></i>Download PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Research Stats -->
<section class="mb-5">
    <div class="impact-section text-center">
        <h2 class="display-5 fw-bold text-white mb-3">Research Impact</h2>
        <p class="text-white-50 mb-4">Our research is driving real change in marine conservation</p>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">25+</div>
                    <div class="text-white-50">Research Papers Published</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">15</div>
                    <div class="text-white-50">Ongoing Studies</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">8</div>
                    <div class="text-white-50">Policy Changes Influenced</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">50+</div>
                    <div class="text-white-50">Research Partners</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="mb-5">
    <div class="text-center p-5 bg-light rounded-3">
        <h2 class="display-5 fw-bold mb-3">Join Our Research Network</h2>
        <p class="lead mb-4">Collaborate with us to advance marine science and innovation in Tanzania</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                <i class="bi bi-person-plus me-2"></i>Become Research Partner
            </a>
            <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                <i class="bi bi-chat-dots me-2"></i>Submit Research Proposal
            </a>
        </div>
    </div>
</section>
@endsection
