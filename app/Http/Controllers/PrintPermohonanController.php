<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintPermohonanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        // $permohonan = Permohonan::find($id);
        $permohonan = Permohonan::findOrFail($id);

        $pdf = Pdf::loadView('folder-permohonan.pdf', compact('permohonan'));

        if ($request->jenis == 'download')
        {
            return $pdf->download('test.pdf');
        }

        return $pdf->stream();

    }
}
