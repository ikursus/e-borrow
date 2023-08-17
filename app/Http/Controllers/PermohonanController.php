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
        $senaraiPegawaiBertanggungjawab = User::select('id', 'name')->get();

        return view('folder-permohonan.template-edit', compact('permohonan', 'senaraiPegawaiBertanggungjawab'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request, Permohonan $permohonan)
    {
        $request->validate([
            'status' => ['required'],
            'pengawai_pengambil_id' => ['required_if:status,' . Permohonan::STATUS_DALAM_PINJAMAN],
            'pengawai_pemulang_id' => ['required_if:status,' . Permohonan::STATUS_DIPULANGKAN]
        ]);

        $data = $request->all();

        // Kemaskini rekod pegawai pengesah jika status lulus atau tidak lulus
        if ($request->status == Permohonan::STATUS_LULUS
        || $request->status == Permohonan::STATUS_TIDAK_LULUS)
        {
            $data['pengawai_pengesah_id'] = auth()->id();
            $data['tarikh_pengesahan'] = now();
        }

        // Kemaskini rekod pegawai pengeluar jika status dalam pinjaman
        elseif ($request->status == Permohonan::STATUS_DALAM_PINJAMAN)
        {
            $data['pengawai_pengeluar_id'] = auth()->id();
            $data['tarikh_pengeluaran'] = now();
            $data['tarikh_ambil'] = now();
        }

        // Kemaskini rekod pegawai pengeluar jika status dalam pinjaman
        elseif ($request->status == Permohonan::STATUS_DIPULANGKAN)
        {
            $data['pengawai_penerima_pulangan_id'] = auth()->id();
            $data['tarikh_terima_pulangan'] = now();
            $data['tarikh_pulangan'] = now();
        }


        // Permohonan::where('id', $id)->update($data);
        // $permohonan = Permohonan::find($id);
        $permohonan->update($data);

        return redirect()->route('permohonan.index')->with('mesej-berjaya', 'Permohonan berjaya dikemaskini');

    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(string $id)
    public function destroy(Permohonan $permohonan)
    {
        // $permohonan = Permohonan::find($id);
        $permohonan->delete();

        return redirect()->route('permohonan.index')->with('mesej-berjaya', 'Permohonan berjaya dihapuskan');

    }
}
