<div class="sidebar" data-color="purple" data-image="{{ asset('admin/assets/img/sidebar-5.jpg') }}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('dashboard') }}" class="simple-text">
                Dashboard User
            </a>
        </div>

        <ul class="nav">
            {{-- Dashboard --}}
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            {{-- User --}}
            <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="pe-7s-users"></i>
                    <p>Pengguna</p>
                </a>
            </li>

            {{-- Profile --}}
            <li class="{{ request()->routeIs('users.profile') ? 'active' : '' }}">
                <a href="{{ route('users.profile', auth()->user()->id) }}">
                    <i class="pe-7s-user"></i>
                    <p>Profil Saya</p>
                </a>
            </li>

            {{-- Change Password --}}
            <li class="{{ request()->routeIs('password.change') ? 'active' : '' }}">
                <a href="{{ route('password.change') }}">
                    <i class="pe-7s-key"></i>
                    <p>Ganti Password</p>
                </a>
            </li>

            {{-- Criteria Code --}}
            <li class="{{ request()->routeIs('criteria-code.*') ? 'active' : '' }}">
                <a href="{{ route('criteria-code.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Kode Kriteria</p>
                </a>
            </li>

            {{-- Criteria --}}
            <li class="{{ request()->routeIs('criteria.*') ? 'active' : '' }}">
                <a href="{{ route('criteria.index') }}">
                    <i class="pe-7s-note"></i>
                    <p>Kriteria</p>
                </a>
            </li>

            {{-- Sub Criteria --}}
            <li class="{{ request()->routeIs('sub-criteria.index') ? 'active' : '' }}">
                <a href="{{ route('sub-criteria.index') }}">
                    <i class="pe-7s-menu"></i>
                    <p>Sub Kriteria</p>
                </a>
            </li>

            {{-- Alternative --}}
            <li class="{{ request()->routeIs('alternative.*') ? 'active' : '' }}">
                <a href="{{ route('alternative.index') }}">
                    <i class="pe-7s-way"></i>
                    <p>Alternatif</p>
                </a>
            </li>

            {{-- Alternative Value --}}
            <li class="{{ request()->routeIs('alternative-value.index') ? 'active' : '' }}">
                <a href="{{ route('alternative-value.index') }}">
                    <i class="pe-7s-graph1"></i>
                    <p>Nilai Alternatif</p>
                </a>
            </li>

            {{-- Smart Calculation --}}
            <li class="{{ request()->routeIs('alternative-value.smart-calculate') ? 'active' : '' }}">
                <a href="{{ route('alternative-value.smart-calculate') }}">
                    <i class="pe-7s-magic-wand"></i>
                    <p>Perhitungan SMART</p>
                </a>
            </li>

            {{-- Logout --}}
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="pe-7s-power"></i>
                    <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
