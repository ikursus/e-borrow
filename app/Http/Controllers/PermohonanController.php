<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiPermohonan = collect();

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permohonan = NULL;
        return view('folder-permohonan.template-edit', compact('permohonan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
