<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // List services
    public function index()
    {
        return Inertia::render('Services/Index', [
            'services' => Service::all(['id', 'title', 'slug'])
        ]);
    }

    // Show single service
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return Inertia::render('Services/Show', [
            'service' => $service
        ]);
    }
}
