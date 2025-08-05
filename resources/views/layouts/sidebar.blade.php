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
