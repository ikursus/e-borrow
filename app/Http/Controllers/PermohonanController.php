<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $senaraiPermohonan = DB::table('permohonan')->get();
        $senaraiPermohonan = Permohonan::get();

        return view('folder-permohonan.template-senarai', compact('senaraiPermohonan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $senaraiPegawaiBertanggungjawab = User::select('id', 'name')->get();

        return view('folder-permohonan.template-add', compact('senaraiPegawaiBertanggungjawab'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cara 1
        // $permohonan = new Permohonan;
        // $permohonan->pegawai_pemohon_id = auth()->id();
        // $permohonan->pegawai_bertanggungjawab_id = $request->input('pegawai_bertanggungjawab_id');
        // $permohonan->tarikh_jangka_pinjam = $request->input('tarikh_jangka_pinjam');
        // $permohonan->tarikh_jangka_pulang = $request->tarikh_jangka_pinjam;
        // $permohonan->tujuan_permohonan = $request->tujuan_permohonan;
        // $permohonan->lokasi_tujuan = $request->input('lokasi_tujuan');
        // $permohonan->status = $request->status;
        // $permohonan->save();

        // Cara 2
        $data = $request->all(); // $request->validate($data);
        $data['pegawai_pemohon_id'] = auth()->id();
        $permohonan = Permohonan::create($data);

        return redirect()->route('permohonan.show', $permohonan->id)->with('mesej-berjaya', 'Permohonan berjaya dihantar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permohonan $permohonan)
    {
        // $permohonan = Permohonan::find($id);

        return view('folder-permohonan.template-detail', compact('permohonan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permohonan $permohonan)
    {
        $permohonan = NULL;

        return view('folder-permohonan.template-edit', compact('permohonan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
