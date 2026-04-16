@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="fade-in-up">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Dashboard</h1>
            <p class="text-muted mb-0">Welcome back! Here's what's happening with your NWIO organization.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-admin btn-admin-primary">
                <i class="bi bi-download"></i>
                Export Report
            </button>
            <button class="btn btn-admin btn-admin-success">
                <i class="bi bi-plus-circle"></i>
                Quick Add
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon primary">
                    <i class="bi bi-book"></i>
                </div>
                <div class="stat-value">{{ $stats['programs'] }}</div>
                <div class="stat-label">Total Programs</div>
                <div class="mt-2">
                    <small class="text-success"><i class="bi bi-arrow-up"></i> 12% from last month</small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="bi bi-folder"></i>
                </div>
                <div class="stat-value">{{ $stats['projects'] }}</div>
                <div class="stat-label">Total Projects</div>
                <div class="mt-2">
                    <small class="text-success"><i class="bi bi-arrow-up"></i> 8% from last month</small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div class="stat-value">{{ $stats['news_events'] }}</div>
                <div class="stat-label">News & Events</div>
                <div class="mt-2">
                    <small class="text-warning"><i class="bi bi-arrow-right"></i> Same as last month</small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-value">{{ $stats['team'] }}</div>
                <div class="stat-label">Team Members</div>
                <div class="mt-2">
                    <small class="text-success"><i class="bi bi-arrow-up"></i> 2 new members</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Projects</h5>
                        <a href="{{ route('admin.projects') }}" class="btn btn-sm btn-admin btn-admin-primary">
                            View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(isset($recentProjects) && count($recentProjects) > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentProjects as $item)
                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">{{ $item->title ?? 'Project Title' }}</h6>
                                            <small class="text-muted">{{ $item->description ?? 'Project description' }}</small>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-primary">Active</span>
                                            <div class="small text-muted mt-1">{{ $item->created_at ?? 'Recently' }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-folder-x display-4 text-muted"></i>
                            <p class="text-muted mt-2">No recent projects found</p>
                            <a href="{{ route('admin.projects') }}" class="btn btn-admin btn-admin-primary">
                                <i class="bi bi-plus-circle"></i> Add First Project
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="admin-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent News</h5>
                        <a href="{{ route('admin.news') }}" class="btn btn-sm btn-admin btn-admin-primary">
                            View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(isset($recentNews) && count($recentNews) > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentNews as $item)
                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">{{ $item->title ?? 'News Title' }}</h6>
                                            <small class="text-muted">{{ Str::limit($item->content ?? 'News content', 100) }}</small>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-success">Published</span>
                                            <div class="small text-muted mt-1">{{ $item->created_at ?? 'Recently' }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-newspaper display-4 text-muted"></i>
                            <p class="text-muted mt-2">No recent news found</p>
                            <a href="{{ route('admin.news') }}" class="btn btn-admin btn-admin-primary">
                                <i class="bi bi-plus-circle"></i> Add First News
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mt-2">
        <div class="col-12">
            <div class="admin-card">
                <div class="card-header">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.programs') }}" class="btn btn-admin btn-admin-primary w-100">
                                <i class="bi bi-plus-circle me-2"></i>
                                Add Program
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.projects') }}" class="btn btn-admin btn-admin-success w-100">
                                <i class="bi bi-folder-plus me-2"></i>
                                Add Project
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.news') }}" class="btn btn-admin btn-admin-info w-100">
                                <i class="bi bi-newspaper me-2"></i>
                                Add News
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.events') }}" class="btn btn-admin btn-admin-warning w-100">
                                <i class="bi bi-calendar-plus me-2"></i>
                                Add Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
