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
        $staff = DB::table('users')->where('id', $id)->first();

        return view('users.template-edit', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->only(['name', 'email', 'telefon']);

        if ($request->has('password') && $request->filled('password'))
        {
            $data['password'] = bcrypt($request->password);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
