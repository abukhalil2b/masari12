<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{


    public function dashboard()
    {
        $user = auth()->user();
        return view('admin.dashboard', compact('user'));
    }
}
