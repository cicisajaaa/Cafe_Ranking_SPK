<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cafe Rank Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{background:#f4f6f9;margin:0;padding:0;}
.sidebar{width:250px;min-height:100vh;background:#1f2937;position:fixed;color:white;}
.sidebar a{color:white;text-decoration:none;display:block;padding:12px;border-radius:8px;margin-bottom:5px;transition:.3s;}
.sidebar a:hover{background:#2563eb;}
.content{margin-left:250px;padding:20px;}
.topbar{background:white;padding:15px 20px;border-radius:12px;box-shadow:0 2px 10px rgba(0,0,0,.08);margin-bottom:25px;}
.logout-btn{width:100%;margin-top:10px;border-radius:10px;}
</style>
</head>
<body>

<div class="sidebar p-3">
    <h3 class="text-center mb-4">☕ Cafe Rank</h3>
    @if(Auth::user()->role == 'mahasiswa')

    <a href="{{ route('student.dashboard') }}">
        <i class="bi bi-house-fill me-2"></i>
        Dashboard
    </a>

    <a href="{{ route('student.ranking') }}">
        <i class="bi bi-trophy-fill me-2"></i>
        Ranking Cafe
    </a>

@elseif(Auth::user()->role == 'owner')

    <a href="{{ route('owner.dashboard') }}">
        <i class="bi bi-house-fill me-2"></i>
        Dashboard
    </a>

    <a href="{{ route('owner.ranking') }}">
        <i class="bi bi-trophy-fill me-2"></i>
        Ranking Cafe
    </a>

@endif
    <hr class="text-light">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger logout-btn">
            Logout
        </button>
    </form>
</div>

<div class="content">
   <div class="topbar">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h5 class="fw-bold mb-0">
                ☕ Cafe Rank
            </h5>

            <small class="text-muted">
                Sistem Pendukung Keputusan Pemilihan Cafe
            </small>

        </div>

        <div class="d-flex align-items-center">

            <div class="text-end me-3">

                <div class="fw-semibold">
                    {{ Auth::user()->name }}
                </div>

                <small class="text-muted text-capitalize">
                    {{ Auth::user()->role }}
                </small>

            </div>

            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                 style="width:45px;height:45px;">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

        </div>

    </div>

</div>

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 