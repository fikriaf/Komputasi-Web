<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title', 'Aplikasi Laravel')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="{{route('homebaru')}}">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('aboutbaru')}}">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('contactbaru')}}">Contact</a>
            </li>  
        </ul>
        </div>
    </div>
    </nav>
    </div>

    <div class="container-fluid mt-3">
        <div><h3>@yield('content')</h3></div>
        <div>@yield('isi')</div>
    </div>

</body>
</html>


