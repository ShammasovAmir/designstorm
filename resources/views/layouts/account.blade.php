<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>@yield('title')</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
</head>

<body>
  <div id="admin-section">
    <div id="sidemenu">
      <div class="logo"></div>
      <nav>
        <a class="active" href="/account">
          <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard
        </a>
        <a class="active" href="/account/projects">
          <i class="fa fa-briefcase" aria-hidden="true"></i>Projects
        </a>
        <a class="active" href="/search">
          <i class="fa fa-search" aria-hidden="true"></i>Search
        </a>
      </nav>
    </div>
    <div id="content-area">
      @yield('content')
    </div>
  </div>
</body>

</html>