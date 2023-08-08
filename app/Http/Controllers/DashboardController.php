<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Dapatkan senarai permohonan
        $senaraiPermohonan = Permohonan::latest()->get();

        // Lakukan kira kira
        $permohonanBaru = Permohonan::where('status', Permohonan::STATUS_BARU)->count();
        $permohonanDalamProses = Permohonan::where('status', Permohonan::STATUS_DALAM_PROSES)->count();
        $permohonanDalamPinjaman = Permohonan::where('status', Permohonan::STATUS_DALAM_PINJAMAN)->count();
        $permohonanSediaDiambil = Permohonan::where('status', Permohonan::STATUS_SEDIA_UNTUK_DIAMBIL)->count();

        // Cara 1 Passing Data
        return view('template-dashboard')
        ->with('senaraiPermohonan', $senaraiPermohonan)
        ->with('permohonanBaru', $permohonanBaru)
        ->with('permohonanDalamProses', $permohonanDalamProses)
        ->with('permohonanDalamPinjaman', $permohonanDalamPinjaman)
        ->with('permohonanSediaDiambil', $permohonanSediaDiambil);
    }
}
