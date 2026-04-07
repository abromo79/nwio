@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8 slide-in-left">
            <div class="mb-4">
                <span class="badge bg-primary mb-3">Get Involved</span>
                <h1 class="display-4 fw-bold mb-3">Join Our Ocean Conservation Mission</h1>
                <p class="lead mb-4">Join NWIO through volunteering, partnerships, or donations to support ocean conservation and coastal resilience in Tanzania. Your involvement makes a real difference in protecting our marine heritage.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="#volunteer-opportunities">
                        <i class="bi bi-hand-heart me-2"></i>Start Volunteering
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                        <i class="bi bi-envelope me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ asset('images/m23.jpeg') }}" class="img-fluid rounded-3 shadow-lg" alt="People getting involved in marine conservation">
            </div>
        </div>
    </div>
</div>

<!-- Involvement Opportunities -->
<section id="volunteer-opportunities" class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">How You Can Help</h2>
        <p class="text-muted">Choose your preferred way to support marine conservation</p>
    </div>
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="involvement-card card h-100 border-0 shadow-lg">
                <div class="card-body p-4 text-center">
                    <div class="involvement-icon bg-primary bg-opacity-10 rounded-circle p-4 mb-3 mx-auto">
                        <i class="bi bi-person-arms-up text-primary fs-1"></i>
                    </div>
                    <h3 class="card-title mb-3">Volunteer</h3>
                    <p class="card-text mb-4">Join field activities, awareness campaigns, and youth ocean programs. Make hands-on impact in coastal communities.</p>
                    
                    <div class="involvement-features mb-4">
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Field work & research</span>
                        </div>
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Community engagement</span>
                        </div>
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Youth mentorship</span>
                        </div>
                    </div>
                    
                    <a class="btn btn-primary" href="{{ route('website.contact') }}">
                        <i class="bi bi-arrow-right me-2"></i>Apply to Volunteer
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="involvement-card card h-100 border-0 shadow-lg">
                <div class="card-body p-4 text-center">
                    <div class="involvement-icon bg-success bg-opacity-10 rounded-circle p-4 mb-3 mx-auto">
                        <i class="bi bi-people text-success fs-1"></i>
                    </div>
                    <h3 class="card-title mb-3">Partner</h3>
                    <p class="card-text mb-4">Collaborate with us in research, conservation projects, and policy dialogue. Build strategic partnerships for greater impact.</p>
                    
                    <div class="involvement-features mb-4">
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Research collaboration</span>
                        </div>
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Project partnerships</span>
                        </div>
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Policy advocacy</span>
                        </div>
                    </div>
                    
                    <a class="btn btn-success" href="{{ route('website.contact') }}">
                        <i class="bi bi-arrow-right me-2"></i>Become Partner
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="involvement-card card h-100 border-0 shadow-lg">
                <div class="card-body p-4 text-center">
                    <div class="involvement-icon bg-warning bg-opacity-10 rounded-circle p-4 mb-3 mx-auto">
                        <i class="bi bi-currency-dollar text-warning fs-1"></i>
                    </div>
                    <h3 class="card-title mb-3">Donate</h3>
                    <p class="card-text mb-4">Support restoration, training, and community-driven blue economy projects. Your donation funds critical conservation work.</p>
                    
                    <div class="involvement-features mb-4">
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Habitat restoration</span>
                        </div>
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Training programs</span>
                        </div>
                        <div class="feature-item text-start mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <span>Community projects</span>
                        </div>
                    </div>
                    
                    <a class="btn btn-warning" href="{{ route('website.contact') }}">
                        <i class="bi bi-arrow-right me-2"></i>Make Donation
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Statistics -->
<section class="mb-5">
    <div class="impact-section text-center">
        <h2 class="display-5 fw-bold text-white mb-3">Your Impact Matters</h2>
        <p class="text-white-50 mb-4">Every contribution helps protect Tanzania's marine ecosystems</p>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">1,000+</div>
                    <div class="text-white-50">Volunteers Engaged</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">50+</div>
                    <div class="text-white-50">Active Partners</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">$500K+</div>
                    <div class="text-white-50">Funds Raised</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-4 fw-bold mb-2">25</div>
                    <div class="text-white-50">Projects Funded</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Success Stories</h2>
        <p class="text-muted">Meet people making a difference in marine conservation</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="story-card card h-100 border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/volunteer-1.jpg') }}" class="rounded-circle me-3" alt="Volunteer" style="width: 60px; height: 60px;">
                        <div>
                            <h6 class="mb-1">Sarah Mwangi</h6>
                            <small class="text-muted">Marine Biology Student</small>
                        </div>
                    </div>
                    <p class="card-text small text-muted">"Volunteering with NWIO transformed my career. I gained hands-on experience in coral reef restoration and community education."</p>
                    <div class="mt-2">
                        <span class="badge bg-primary bg-opacity-10 text-primary">Volunteer</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="story-card card h-100 border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/partner-1.jpg') }}" class="rounded-circle me-3" alt="Partner" style="width: 60px; height: 60px;">
                        <div>
                            <h6 class="mb-1">Ocean Tech Ltd</h6>
                            <small class="text-muted">Technology Partner</small>
                        </div>
                    </div>
                    <p class="card-text small text-muted">"Our partnership with NWIO helped us develop innovative solutions for sustainable fishing practices that benefit both communities and marine life."</p>
                    <div class="mt-2">
                        <span class="badge bg-success bg-opacity-10 text-success">Partner</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="story-card card h-100 border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/donor-1.jpg') }}" class="rounded-circle me-3" alt="Donor" style="width: 60px; height: 60px;">
                        <div>
                            <h6 class="mb-1">John Smith</h6>
                            <small class="text-muted">Individual Donor</small>
                        </div>
                    </div>
                    <p class="card-text small text-muted">"Supporting NWIO's work has been incredibly rewarding. Seeing the direct impact of my contribution on marine conservation is amazing."</p>
                    <div class="mt-2">
                        <span class="badge bg-warning bg-opacity-10 text-warning">Donor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="mb-5">
    <div class="text-center p-5 bg-light rounded-3">
        <h2 class="display-5 fw-bold mb-3">Ready to Make a Difference?</h2>
        <p class="lead mb-4">Join our community of ocean conservation champions today</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a class="btn btn-primary btn-lg" href="{{ route('website.contact') }}">
                <i class="bi bi-chat-dots me-2"></i>Get Started Now
            </a>
            <a class="btn btn-outline-primary btn-lg" href="{{ route('website.about') }}">
                <i class="bi bi-info-circle me-2"></i>Learn More
            </a>
        </div>
    </div>
</section>
@endsection
