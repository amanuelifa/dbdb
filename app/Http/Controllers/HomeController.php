<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

//dd('Admin');
        if (Auth::user()->usertype == 'user') {
            return view('dashboard');
        } elseif(Auth::user()->usertype == 'technician') {
            return view('technician.technician');
        }
        else {
            return view('admin.home');
        }

    }
}
