<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PermohonanBaruToPemohon;

class PinjamanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $senaraiPegawaiBertanggungjawab = User::select('id', 'name')->get();

        return view('pinjaman.borang-permohonan', compact('senaraiPegawaiBertanggungjawab'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Dapatkan semua data dari borang
        $data = $request->all(); // $request->validate($data);

        // Dapatkan rekod pemohon
        $pemohon = User::where('email', $data['pegawai_pemohon_email'])->first();

        // Jika tiada rekod pemohon, kembali ke halaman sebelum
        if (!$pemohon)
        {
            return redirect()->back()->withErrors([
                'pegawai_pemohon_email' => 'Rekod pemohon tidak wujud. Sila hubungi admin.',
            ])->onlyInput('pegawai_pemohon_email');
        }

        // Jika wujud rekod pemohon, dapatkan id-nya dan attach ke data permohonan
        $data['pegawai_pemohon_id'] = $pemohon->id;

        // Tetapkan status permohonan kepada baru
        $data['status'] = Permohonan::STATUS_BARU;
        $data['ticket'] = Str::random(6);

        // Semak jika ada data fail sokongan
        if ($request->hasFile('fail_sokongan'))
        {
            // Dapatkan fail daripada field fail_sokongan borang permohonan
            $file = $request->file('fail_sokongan');

            // Simpan fail yang diupload ke dalam folder dokumen
            // yang akan dicipta dalam folder public/uploaded.
            // Seterusnya dapatkan dapatkan nama baru file yang telah diupload
            // function ->store('nama_folder', 'nama_disks_dalam_filesystem.php')
            $namaBaruFile = $file->store('dokumen', 'public_uploaded');

            // Simpan nama baru fail sokongan yang diupload ke dalam table permohonan
            $data['fail_sokongan'] = $namaBaruFile;
        }

        // Jika tiada masalah, simpan rekod
        $permohonan = Permohonan::create($data);

        // Setelah selesai, hantar notifikasi dan redirect ke halaman status pinjaman
        // Hantar notification
        Mail::to($pemohon->email)->send(new PermohonanBaruToPemohon($permohonan));

        // Selepas selesai notifikasi, redirect
        return redirect()->route('pinjaman.result', ['ticket' => $permohonan->ticket])
        ->with('mesej-berjaya', 'Permohonan berjaya dihantar!');
    }

    /**
     * Display the specified resource.
     */
    public function semakStatus()
    {
        return view('pinjaman.borang-status');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function resultStatus(Request $request)
    {
        $permohonan = Permohonan::where('ticket', '=', $request->ticket)->first();

        return view('pinjaman.status-permohonan', compact('permohonan'));
    }
}
