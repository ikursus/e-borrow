<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pageTitle = '<span class="text-danger">Halaman Dashboard</span>';

        $senaraiStaff = DB::table('users')->get();

        //return view('dashboard');

        // Cara 1 Passing Data
        return view('template-dashboard')
        ->with('pageTitle', $pageTitle)
        ->with('senaraiStaff', $senaraiStaff);
    }
}
