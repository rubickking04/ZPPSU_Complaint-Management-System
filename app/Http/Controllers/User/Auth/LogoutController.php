<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Logs out authenticated user.
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('user.login');
    }
}
