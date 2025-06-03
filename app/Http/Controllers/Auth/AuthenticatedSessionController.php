<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.auth.login');
    }

    public function destroy() {
        try {
            Auth::logout();
            return redirect()->route('login.create');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
