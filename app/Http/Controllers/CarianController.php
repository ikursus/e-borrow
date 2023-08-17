<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CarianController extends Controller
{
    public function pbjwb(Request $request)
    {
        $carian = $request->input('term');

        $senaraiPegawai = User::query()->where('name', 'LIKE', "%$carian%")
        ->orWhere('email', 'LIKE', "%$carian%")
        ->select('id', 'name')
        ->get();

        return response()->json($senaraiPegawai);
    }
}
