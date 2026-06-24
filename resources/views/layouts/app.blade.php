<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemilihan Cafe</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body{
            background-color:#f4f6f9;
        }

        .sidebar{
            min-height:100vh;
            width:250px;
            background:#1f2937;
            color:white;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:10px;
            border-radius:5px;
            margin-bottom:5px;
        }

        .sidebar a:hover{
            background:#2563eb;
        }

        .content{
            padding:20px;
        }
        .sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:10px;
    border-radius:8px;
    margin-bottom:5px;
    transition:.3s;
}

.sidebar a:hover{
    background:#2563eb;
    transform:translateX(5px);
}
.card{
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
    box-shadow:0 12px 25px rgba(0,0,0,.15);
}
    </style>

</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar p-3">

        <h4 class="text-center mb-4">
            ☕ Cafe Rank
        </h4>

        <a href="{{ route('admin.dashboard') }}"
   class="{{ request()->is('dashboard') ? 'bg-primary' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.cafes.index') }}"
   class="{{ request()->is('cafes*') ? 'bg-primary' : '' }}">
            <i class="bi bi-house-door-fill me-2"></i>
            Data Cafe
        </a>

        <a href="{{ route('admin.criteria.index') }}"
   class="{{ request()->is('criteria*') ? 'bg-primary' : '' }}">
            <i class="bi bi-list-check me-2"></i>
            Kriteria
        </a>

        <a href="{{ route('admin.ranking.index') }}"
   class="{{ request()->is('ranking*') ? 'bg-primary' : '' }}">
            <i class="bi bi-trophy-fill me-2"></i>
            Ranking
        </a>

        <hr>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                    class="btn btn-danger w-100">

                Logout

            </button>
        </form>

    </div>

    <!-- Content -->
    <div class="flex-grow-1">

        <nav class="navbar bg-white shadow-sm">

            <div class="container-fluid">

                <span class="fw-bold">
                    Sistem Pendukung Keputusan Pemilihan Cafe
                </span>

            </div>

        </nav>

        <div class="content">

            @yield('content')

        </div>

    </div>

</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'{{ session("success") }}',
    timer:2000,
    showConfirmButton:false
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon:'error',
    title:'Gagal',
    text:'{{ session("error") }}'
});
</script>
@endif
<footer class="text-center text-muted py-3">

    © {{ date('Y') }}
    Sistem Pendukung Keputusan Pemilihan Cafe
    menggunakan Metode TOPSIS

</footer>
</body>
</html>