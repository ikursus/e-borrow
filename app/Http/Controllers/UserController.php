<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiStaff = DB::table('users')
        ->paginate(20);

        // Dump and die
        // dd($senaraiStaff);

        // return view('users.template-senarai', ['senaraiStaff' => $senaraiStaff]);
        return view('users.template-senarai', compact('senaraiStaff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Dapatkan rekod staff/pengguna berdasarkan ID
        $staff = DB::table('users')->where('id', '=', $id)->first();

        // dd($staff);

        return view('users.template-detail', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Dapatkan rekod staff/pengguna berdasarkan ID
        $staff = DB::table('users')->where('id', $id)->first();

        // Dapatkan dropdown senarai bahagian
        $senaraiBahagian = DB::table('bahagian')->select('id', 'nama')->get();

        return view('users.template-edit', ['staff' => $staff, 'senaraiBahagian' => $senaraiBahagian]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Dapatkan data yang boleh dikemaskini daripada borang edit
        // Jika menggunakan Query Builder, tetapkan data apa yang boleh dikemaskini
        $data = $request->only(['name', 'email', 'telefon', 'jawatan', 'bahagian_id']);

        // Jika password diisi, attachkan data password yang di encrypt kepada
        // array $data
        if ($request->has('password') && $request->filled('password'))
        {
            $data['password'] = bcrypt($request->password);
        }

        // Kemaskini rekod user berdasarkan ID
        DB::table('users')->where('id', $id)->update($data);

        // Return redirect ke halaman senarai pengguna
        // dan bagi Flash Messaging untuk makluman rekod berjaya dikemaskini
        return redirect()->route('users.index')->with('mesej-berjaya', 'Rekod telah dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete rekod user berdasarkan ID
        DB::table('users')->where('id', $id)->delete();

        // Return redirect ke halaman senarai pengguna
        // dan bagi Flash Messaging untuk makluman rekod berjaya dikemaskini
        return redirect()->route('users.index')->with('mesej-berjaya', 'Rekod telah dipadam');
    }
}
