<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel CRUD Rumah Sakit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">RS CRUD</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item"><a class="nav-link" href="{{ route('hospitals.index') }}">Hospitals</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('patients.index') }}">Patients</a></li>
        <li class="nav-item">
            <form method="POST" action='{{ route("logout") }}'>@csrf<button class="btn btn-link nav-link">Logout</button></form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    @if(session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#success-alert').fadeOut('slow');
        }, 2000); 
    });
</script>
@stack('scripts')
</body>
</html>
