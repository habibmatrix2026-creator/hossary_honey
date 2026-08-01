<!DOCTYPE html>

<html lang="en" data-bs-theme="dark" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>admin</title>
@livewireStyles
  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css')}} ">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="index.html" aria-label="adminHMD dashboard">
          <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
          <span class="brand-copy">
            <span class="brand-title">{{ Auth::user()->name }}</span>
          </span>
        </a>
      </div>

      @livewire("admin.nav")



      <div class="sidebar-footer">
        <span class="status-dot"></span>
        <span class="sidebar-footer-text">System running smoothly</span>
      </div>
    </aside>

    <main class="admin-main">
    @livewire('admin.navbar')


    @yield('content')
      <footer class="admin-footer">
        <div class="px-3 container-fluid px-lg-4">

        </div>
      </footer>
    </div>
  </div>
@livewireScripts
  <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
  <script src="admin/assets/js/main.js"></script>
</body>
</html>
