@extends('layouts.website')

@section('content')

<!-- Welcome Section with Sliding Background -->
<div class="welcome-slider-section position-relative mb-5" style="height: 600px; overflow: hidden;">
    <!-- Sliding Background Images -->
    <div class="slider-background">
        <div class="slide active" style="background-image: url('{{ asset('images/m1.jpeg') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/m12.jpeg') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/m24.jpeg') }}');"></div>
    </div>
    
    <!-- Dark Overlay for Text Visibility -->
    <div class="overlay-dark" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.6); z-index: 1;"></div>
    
    <!-- Welcome Message Overlay -->
    <div class="welcome-message-overlay position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index: 2;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <h1 class="display-2 fw-bold mb-3 text-white">Welcome to NWIO</h1>
                        <p class="lead mb-4 text-white">Empowering coastal communities in Tanzania through marine conservation, research, and sustainable blue economy solutions.</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                                Get Involved <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            <a class="btn btn-outline-light btn-lg" href="{{ route('website.about') }}">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Slider Indicators -->
    <div class="slider-indicators position-absolute bottom-0 start-50 translate-middle" style="z-index: 3;">
        <button class="indicator active" data-slide="0"></button>
        <button class="indicator" data-slide="1"></button>
        <button class="indicator" data-slide="2"></button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.indicator');
    const totalSlides = slides.length;
    
    // Auto-slide functionality
    function showSlide(index) {
        // Hide all slides
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            slide.style.opacity = '0';
        });
        
        // Remove active class from all indicators
        indicators.forEach((indicator, i) => {
            indicator.classList.remove('active');
        });
        
        // Show current slide
        slides[index].classList.add('active');
        slides[index].style.opacity = '1';
        
        // Add active class to current indicator
        indicators[index].classList.add('active');
        
        currentSlide = index;
    }
    
    // Auto-slide every 4 seconds
    setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }, 4000);
    
    // Manual slide control with indicators
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showSlide(index);
        });
    });
    
    // Pause auto-slide on hover
    const sliderSection = document.querySelector('.welcome-slider-section');
    sliderSection.addEventListener('mouseenter', () => {
        // Pause auto-slide on hover
        clearInterval(window.autoSlideInterval);
    });
    
    sliderSection.addEventListener('mouseleave', () => {
        // Resume auto-slide when not hovering
        window.autoSlideInterval = setInterval(() => {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }, 4000);
    });
});
</script>


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
