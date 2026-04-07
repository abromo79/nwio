@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8 slide-in-left">
            <div class="mb-4">
                <span class="badge bg-primary mb-3">Latest News</span>
                <h1 class="display-4 fw-bold mb-3">Marine Conservation News</h1>
                <p class="lead mb-4">Stay updated with the latest developments in marine conservation, research, and community engagement across Tanzania.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="{{ route('website.get-involved') }}">
                        <i class="bi bi-rss me-2"></i>Subscribe to Updates
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('website.contact') }}">
                        <i class="bi bi-envelope me-2"></i>Contact Press Office
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ asset('images/m26.jpeg') }}" class="img-fluid rounded-3 shadow-lg" alt="Marine conservation news and updates">
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
                            <label class="form-label fw-bold">Category</label>
                            <select class="form-select">
                                <option value="">All Categories</option>
                                <option value="research">Research Updates</option>
                                <option value="conservation">Conservation News</option>
                                <option value="community">Community Stories</option>
                                <option value="policy">Policy Changes</option>
                                <option value="events">Event Coverage</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Date Range</label>
                            <select class="form-select">
                                <option value="">All Time</option>
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                                <option value="quarter">Last 3 Months</option>
                                <option value="year">This Year</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Sort By</label>
                            <select class="form-select">
                                <option value="recent">Most Recent</option>
                                <option value="popular">Most Popular</option>
                                <option value="trending">Trending</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6 class="fw-bold mb-3">News Stats</h6>
                    <div class="row g-2 text-center">
                        <div class="col-6">
                            <div class="stat-box bg-light rounded-2 p-2">
                                <div class="fw-bold text-primary">{{ count($news) }}</div>
                                <small class="text-muted">Total Articles</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-box bg-light rounded-2 p-2">
                                <div class="fw-bold text-success">12</div>
                                <small class="text-muted">This Month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured News -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Featured Stories</h2>
        <p class="text-muted">Important updates and breakthroughs in marine conservation</p>
    </div>
    <div class="row g-4">
        @foreach($news->take(3) as $index => $item)
            <div class="col-lg-4">
                <div class="featured-news card h-100 border-0 shadow-lg">
                    <div class="position-relative">
                        <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="featured-badge bg-primary text-white position-absolute top-0 end-0 m-2 px-2 py-1 rounded-2">
                            <i class="bi bi-star-fill me-1"></i>Featured
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="news-category mb-2">
                            <span class="badge bg-light text-dark">{{ $item->category ?? 'Conservation' }}</span>
                            <span class="text-muted small ms-2">
                                <i class="bi bi-calendar3 me-1"></i>{{ $item->date }}
                            </span>
                        </div>
                        
                        <h4 class="card-title mb-3">{{ $item->title }}</h4>
                        
                        <div class="news-excerpt mb-3">
                            <p class="text-muted">{{ Str::limit($item->content, 120) }}</p>
                        </div>

                        <div class="news-meta mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="news-author">
                                    <i class="bi bi-person text-primary me-1"></i>
                                    <small class="text-muted">By {{ $item->author ?? 'NWIO Team' }}</small>
                                </div>
                                <div class="news-reading-time">
                                    <i class="bi bi-clock text-info me-1"></i>
                                    <small class="text-muted">{{ $item->reading_time ?? '5 min' }} read</small>
                                </div>
                            </div>
                        </div>

                        <div class="news-tags mb-3">
                            <div class="d-flex gap-1 flex-wrap">
                                <span class="badge bg-light text-dark me-1">#marine-conservation</span>
                                <span class="badge bg-light text-dark me-1">#tanzania</span>
                                <span class="badge bg-light text-dark">#ocean-protection</span>
                            </div>
                        </div>

                        <div class="news-actions">
                            <div class="d-flex gap-2">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="bi bi-eye me-1"></i>Read More
                                </a>
                                <a class="btn btn-outline-primary btn-sm" href="#">
                                    <i class="bi bi-share me-1"></i>Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- All News Grid -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">All News & Updates</h2>
        <p class="text-muted">Browse through our complete collection of marine conservation news</p>
    </div>
    <div class="row g-4">
        @foreach($news->skip(3) as $index => $item)
            <div class="col-lg-6">
                <div class="news-card card h-100 border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="news-status">
                                <span class="badge bg-success">Latest</span>
                            </div>
                            <div class="news-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; min-width: 30px; font-size: 0.8rem;">
                                {{ $index + 4 }}
                            </div>
                        </div>
                        
                        <div class="news-meta mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="meta-item">
                                        <i class="bi bi-calendar3 text-primary me-1"></i>
                                        <small class="text-muted">Date:</small>
                                        <div class="fw-semibold">{{ $item->date }}</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="meta-item">
                                        <i class="bi bi-folder text-info me-1"></i>
                                        <small class="text-muted">Category:</small>
                                        <div class="fw-semibold">{{ $item->category ?? 'Conservation' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title mb-3">{{ $item->title }}</h4>
                        
                        <div class="news-excerpt mb-3">
                            <p class="text-muted">{{ Str::limit($item->content, 100) }}</p>
                        </div>

                        <div class="news-actions">
                            <div class="d-flex gap-2 justify-content-between align-items-center">
                                <div class="news-tags">
                                    <div class="d-flex gap-1">
                                        <span class="badge bg-light text-dark me-1">#conservation</span>
                                        <span class="badge bg-light text-dark">#marine</span>
                                    </div>
                                </div>
                                <div class="news-buttons">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="bi bi-eye me-1"></i>Read Article
                                    </a>
                                </div>
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
        <i class="bi bi-arrow-clockwise me-2"></i>Load More News
    </button>
</section>

<!-- Newsletter Signup -->
<section class="mb-5">
    <div class="impact-section text-center">
        <h2 class="display-5 fw-bold text-white mb-3">Stay Connected</h2>
        <p class="text-white-50 mb-4">Get the latest marine conservation news delivered to your inbox</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="email" class="form-control form-control-lg" placeholder="Enter your email address">
                    <button class="btn btn-light btn-lg" type="button">
                        <i class="bi bi-send me-2"></i>Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
