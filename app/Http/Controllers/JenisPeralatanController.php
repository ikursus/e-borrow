<?php

namespace App\Http\Controllers;

use App\Models\JenisPeralatan;
use Illuminate\Http\Request;

class JenisPeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(JenisPeralatan $jenisPeralatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPeralatan $jenisPeralatan)
    {
        return view('jenisperalatan.borang-edit', compact('jenisPeralatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPeralatan $jenisPeralatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPeralatan $jenisPeralatan)
    {
        //
    }
}
