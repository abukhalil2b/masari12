<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();
        return view('dashboard', compact('user'));
    }


}
