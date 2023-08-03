<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public
    // protected
    // private

    // Function 1 / Method
    // Paparkan borang untuk login ke dalam sistem
    public function borangLogin()
    {
        // Beri response, panggil template login.blade.php
        // dari folder resources/views/authentication

        return view('authentication.login');

    }

    // Function 2
    // Terima data daripada borang login
    // Dan buat semakan maklumat login
    public function authenticate(Request $request)
    {
        // Dapatkan semua data
        //$data = $request->all();
        $data = $request->validate([
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'min:3']
        ]);

        // Dapatkan single data
        // $data = $request->input('email');

        // Dapatkan data - data tertentu
        // $data = $request->only(['email', 'password']); // $request->except(['_token'])

        return $data;

        // return redirect()->route('utama');

    }

}
