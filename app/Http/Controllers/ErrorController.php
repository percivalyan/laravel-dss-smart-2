<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function error403()
    {
        return response()->view('errors.403', [], 403);
    }

    public function error404()
    {
        return response()->view('errors.404', [], 404);
    }

    public function error500()
    {
        return response()->view('errors.500', [], 500);
    }

    public function error503()
    {
        return response()->view('errors.503', [], 503);
    }
}
