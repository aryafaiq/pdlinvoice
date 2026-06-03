<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDL Invoice</title>
    <link rel="icon" href="{{ asset('img/logopdl.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Varela+Round&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
      
body{
  font-family: "Varela Round", sans-serif;
  font-weight: 500;
  font-style: normal;
}



        /* Custom style minor untuk mempertahankan efek soft & smooth dari versi Tailwind */
        .bg-soft-indigo {
            background-color: rgba(99, 102, 241, 0.08) !important;
            color: #4f46e5 !important;
        }

        .bg-navy {
            background-color: #00246B;
        }

        .text-indigo {
            color: #6366f1 !important;
        }

        .bg-indigo-light {
            background-color: #f5f3ff !important;
        }

        .sidebar-link {
            transition: all 0.2s ease-in-out;
            color: #64748b;
            text-decoration: none;
        }

        .sidebar-link:hover {
            background-color: rgba(99, 102, 241, 0.08) !important;
            color: #4f46e5 !important;
        }

        .sidebar-link i {
            color: #94a3b8;
            transition: color 0.2s ease;
        }

        .sidebar-link:hover i {
            color: #475569;
        }

        .letter-spacing-wide {
            letter-spacing: 0.05em;
        }

        /* MODIFIKASI LAYOUT UTAMA */
        body,
        html {
            height: 100vh;
            overflow: hidden;
            /* Mencegah seluruh halaman ikut ter-scroll */
        }

        .sidebar-width {
            width: 256px;
            flex-shrink: 0;
            /* Mencegah ukuran sidebar menyusut saat konten utama padat */
        }
    </style>
    @yield('custom-css')
</head>

<body class="bg-light d-flex m-0 h-100">

    <!-- SIDEBAR CONTAINER (Tetap diam di tempat, setinggi layar) -->
    <aside
        class="sidebar-width bg-white border-end border-light-subtle d-flex flex-column justify-content-between p-3 vh-100 shadow-lg">

        <!-- TOP SECTION: Logo & Navigasi -->
        <div class="d-flex flex-column gap-4">
            <!-- Logo / Brand -->
            <div class="d-flex align-items-center gap-3 px-2 py-1">
                <img src="{{ asset('img/logopdl.png') }}" alt="" style="width: 140px">

            </div>

            <!-- Menu Utama -->
            <nav class="d-flex flex-column gap-1">
                <p class="text-muted fs-10 fw-bold">PT PORTIBION DJEWELINDO LOGISTIK</p>
                <hr class="bg-navy">
                <!-- Active Item -->
                <a href="/"
                    class="sidebar-link fw-medium rounded-3 d-flex align-items-center gap-3 px-3 py-2 fs-7">
                    <i data-lucide="layout-dashboard" class="text-indigo" style="width: 16px; height: 16px;"></i>
                    <span style="font-size: 14px;">Dashboard</span>
                </a>

                <!-- Normal Item -->
                <a href="{{ route('invoice.index') }}"
                    class="sidebar-link fw-medium rounded-3 d-flex align-items-center gap-3 px-3 py-2 fs-7">
                    <i data-lucide="folder-open" style="width: 16px; height: 16px;"></i>
                    <span style="font-size: 14px;">Invoice</span>
                </a>
                <a href="{{ route('perusahaan.index') }}"
                    class="sidebar-link fw-medium rounded-3 d-flex align-items-center gap-3 px-3 py-2 fs-7">
                    <i data-lucide="id-card" style="width: 16px; height: 16px;"></i>
                    <span style="font-size: 14px;">Recipient</span>
                </a>
            </nav>
        </div>

        <!-- BOTTOM SECTION: Profil Pengguna -->
        <div class="border-top border-light-subtle pt-3 mt-auto">
            <div class="sidebar-link d-flex align-items-center justify-content-between p-2 rounded-3"
                style="cursor: pointer;">
                <div class="d-flex align-items-center gap-3">
                    <!-- Avatar dengan inisial -->
                    <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center fw-semibold"
                        style="width: 36px; height: 36px; font-size: 14px;">
                        PD
                    </div>
                    <div class="d-flex flex-col text-start">
                        <span class="fw-semibold text-dark d-block lh-1 mb-1" style="font-size: 12px;">Admin</span>
                    </div>
                </div>
                <i data-lucide="log-out" class="text-muted" style="width: 16px; height: 16px;"></i>
            </div>
        </div>

    </aside>

    <!-- MAIN CONTENT AREA (Bisa di-scroll secara mandiri jika konten melebihi batas bawah layar) -->
    <main class="flex-grow-1 p-5 bg-navy bg-gradient vh-100 overflow-y-auto">
        @yield('content')
    </main>

    <!-- Bootstrap JS Bundle (Termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
    </script>
    <!-- Inisialisasi Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
