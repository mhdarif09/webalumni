<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        return view('admin.dashboard');
    }

    /**
     * Placeholder for alumni management.
     */
    public function alumni()
    {
        return view('admin.alumni.index');
    }

    /**
     * Placeholder for job management.
     */
    public function jobs()
    {
        return view('admin.jobs.index');
    }
}
