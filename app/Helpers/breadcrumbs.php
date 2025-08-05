<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('generate_breadcrumbs')) {
    function generate_breadcrumbs(): array
    {
        $breadcrumbs = [];

        $segments = request()->segments();
        $path = '';

        foreach ($segments as $key => $segment) {
            $path .= '/' . $segment;

            // Judul kustom berdasarkan segmen yang digunakan di routes
            $customTitles = [
                'dashboard' => 'Dashboard',
                'users' => 'Pengguna',
                'profile' => 'Profil',
                'change-password' => 'Ubah Password',
                'login' => 'Login',
            ];

            // Cek apakah segment numerik (biasanya ID)
            if (is_numeric($segment)) {
                $prevSegment = $segments[$key - 1] ?? '';
                $title = 'Detail ' . ucwords(str_replace(['-', '_'], ' ', $prevSegment));
            } else {
                $title = $customTitles[$segment] ?? ucwords(str_replace(['-', '_'], ' ', $segment));
            }

            // Segment terakhir tidak diberi URL
            $breadcrumbs[] = [
                'title' => $title,
                'url'   => $key < count($segments) - 1 ? url($path) : null,
            ];
        }

        return $breadcrumbs;
    }
}
