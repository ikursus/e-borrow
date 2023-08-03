<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pageTitle = '<span class="text-danger">Halaman Dashboard</span>';

        $senaraiStaff = [
            // Staff 1
            [
                'name' => 'Ahmad Albab',
                'position' => 'System Architect',
                'office' => 'Jabatan Audit Negara',
                'age' => '40',
                'start_date' => '1 Ogos 2023',
                'salary' => 'RM4000'
            ],
            // Staff 2
            [
                'name' => 'Upin Ipin',
                'position' => 'Web Developer',
                'office' => 'Jabatan Audit Negara',
                'age' => '30',
                'start_date' => '31 July 2023',
                'salary' => 'RM3000'
            ],
            // Staff 3
            [
                'name' => 'Ejen Ali',
                'position' => 'Accountant',
                'office' => 'Jabatan Audit Negara',
                'age' => '20',
                'start_date' => '1 Ogos 2023',
                'salary' => 'RM3000'
            ],
        ];

        //return view('dashboard');

        // Cara 1 Passing Data
        return view('template-dashboard')
        ->with('pageTitle', $pageTitle)
        ->with('senaraiStaff', $senaraiStaff);
    }
}
