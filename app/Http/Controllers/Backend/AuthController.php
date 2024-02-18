<?php
 
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman formulir untuk masuk.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('backend.login');
    }
}