<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure the view file is in 'resources/views/auth/loginold.blade.php'
    }
}
