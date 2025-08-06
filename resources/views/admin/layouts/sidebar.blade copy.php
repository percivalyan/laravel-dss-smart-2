<div class="sidebar" data-color="purple" data-image="{{ asset('admin/assets/img/sidebar-5.jpg') }}">
    <div class="sidebar-wrapper">
        <div class="logo text-center py-3">
            <a href="{{ route('dashboard') }}" class="simple-text fs-5 fw-bold text-white">
                Dashboard User
            </a>
        </div>

        <ul class="nav flex-column">
            {{-- Dashboard --}}
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    Dashboard
                </a>
            </li>

            {{-- Pengguna --}}
            <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    Pengguna
                </a>
            </li>

            {{-- Profil --}}
            <li class="nav-item {{ request()->routeIs('users.profile') ? 'active' : '' }}">
                <a href="{{ route('users.profile', auth()->user()->id) }}" class="nav-link">
                    Profil Saya
                </a>
            </li>

            {{-- Ganti Password --}}
            <li class="nav-item {{ request()->routeIs('password.change') ? 'active' : '' }}">
                <a href="{{ route('password.change') }}" class="nav-link">
                    Ganti Password
                </a>
            </li>

            {{-- DSS Academic --}}
            <li class="nav-item">
                <a href="#" class="nav-link toggle-dropdown">
                    </i> DSS Academic
                </a>
                <ul class="nav flex-column submenu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('criteria-code.index') }}">Kode Kriteria</a></li>
                    <li><a class="nav-link" href="{{ route('criteria.index') }}">Kriteria</a></li>
                    <li><a class="nav-link" href="{{ route('sub-criteria.index') }}">Sub Kriteria</a></li>
                    <li><a class="nav-link" href="{{ route('alternative.index') }}">Alternatif</a></li>
                    <li><a class="nav-link" href="{{ route('alternative-value.index') }}">Nilai Alternatif</a></li>
                    <li><a class="nav-link" href="{{ route('alternative-value.smart-calculate') }}">Perhitungan
                            SMART</a></li>
                </ul>
            </li>

            {{-- DSS Non Academic --}}
            <li class="nav-item">
                <a href="#" class="nav-link toggle-dropdown">
                    </i> DSS Non Academic
                </a>
                <ul class="nav flex-column submenu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('criteria-code.index', ['type' => 'non']) }}">Kode
                            Kriteria</a></li>
                    <li><a class="nav-link" href="{{ route('criteria.index', ['type' => 'non']) }}">Kriteria</a></li>
                    <li><a class="nav-link" href="{{ route('sub-criteria.index', ['type' => 'non']) }}">Sub
                            Kriteria</a></li>
                    <li><a class="nav-link" href="{{ route('alternative.index', ['type' => 'non']) }}">Alternatif</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('alternative-value.index', ['type' => 'non']) }}">Nilai
                            Alternatif</a></li>
                    <li><a class="nav-link"
                            href="{{ route('alternative-value.smart-calculate', ['type' => 'non']) }}">Perhitungan
                            SMART</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

{{-- Script Toggle Dropdown --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggles = document.querySelectorAll('.toggle-dropdown');
        toggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const submenu = this.nextElementSibling;
                submenu.style.display = (submenu.style.display === "none" || submenu.style
                    .display === "") ? "block" : "none";
            });
        });
    });
</script>

<style>
    .sidebar-wrapper {
        padding: 15px;
        color: #fff;
    }

    .nav-link {
        color: #f1f1f1;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        /* Spasi antara ikon dan teks */
        transition: background 0.3s ease;
        font-size: 15px;
    }

    .nav-link i {
        font-size: 18px;
        min-width: 20px;
        text-align: center;
        line-height: 1;
    }

    .nav-link:hover,
    .nav-item.active>.nav-link {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
    }

    .submenu {
        display: none;
        margin-left: 20px;
        margin-top: 5px;
    }

    .submenu .nav-link {
        font-size: 14px;
        padding: 8px 20px;
        padding-left: 40px;
        color: #e0e0e0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .submenu .nav-link:hover {
        color: #fff;
    }
</style>
