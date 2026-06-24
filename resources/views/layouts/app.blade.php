<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Ranking SPK</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        /* SIDEBAR FIX */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #1f2937;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 6px;
            transition: 0.2s;
            font-size: 14px;
        }

        .sidebar a:hover {
            background: #2563eb;
            transform: translateX(4px);
        }

        .sidebar a.active {
            background: #2563eb;
        }

        /* MAIN CONTENT FIX */
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }

        /* NAVBAR FIX */
        .top-navbar {
            margin-left: 260px;
            background: white;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* CARD EFFECT */
        .card {
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h4>☕ Cafe Rank</h4>

    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <a href="{{ route('admin.cafes.index') }}"
       class="{{ request()->routeIs('admin.cafes.*') ? 'active' : '' }}">
        <i class="bi bi-cup-hot me-2"></i> Data Cafe
    </a>

    <a href="{{ route('admin.criteria.index') }}"
       class="{{ request()->routeIs('admin.criteria.*') ? 'active' : '' }}">
        <i class="bi bi-list-check me-2"></i> Kriteria
    </a>

    <a href="{{ route('admin.ranking.index') }}"
       class="{{ request()->routeIs('admin.ranking.*') ? 'active' : '' }}">
        <i class="bi bi-trophy me-2"></i> Ranking
    </a>

    <hr>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger w-100">
            Logout
        </button>
    </form>

</div>

<!-- TOP NAVBAR -->
<div class="top-navbar">
    <strong>Sistem Pendukung Keputusan Pemilihan Cafe</strong>
</div>

<!-- CONTENT -->
<div class="main-content">

    @yield('content')

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session("success") }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: '{{ session("error") }}'
});
</script>
@endif

</body>
</html>