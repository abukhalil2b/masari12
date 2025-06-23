<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component {

	public function render(): View {
		//if authenticated
		if (Auth::guard()->check()) {

			if (Auth::user()->profile_using == 'trainee') {
				return view('layouts.trainee_app');
			}
		}

		return view('layouts.app');
	}
}
