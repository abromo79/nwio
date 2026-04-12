<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWIO Admin Panel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">NWIO Admin Panel</span>
        <div class="d-flex gap-2">
            <a class="btn btn-sm btn-outline-light" href="{{ route('website.home') }}">View Website</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn btn-sm btn-warning" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 bg-white border-end min-vh-100 p-3">
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.about') }}">About</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.programs') }}">Programs</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.projects') }}">Projects</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.research') }}">Research</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.news') }}">News</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.events') }}">Events</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.team') }}">Team</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.gallery') }}">Gallery</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.get-involved') }}">Get Involved</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.messages') }}">Messages</a>
                <a class="list-group-item list-group-item-action" href="{{ route('admin.users') }}">Users</a>
            </div>
        </aside>
        <main class="col-md-9 col-lg-10 p-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
