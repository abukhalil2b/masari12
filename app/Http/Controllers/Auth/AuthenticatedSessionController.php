<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
	/**
	 * Display the login view.
	 */
	public function create(): View
	{
		return view('auth.login');
	}

	/**
	 * Handle an incoming authentication request.
	 */
	public function store(LoginRequest $request): RedirectResponse
	{
		$request->authenticate();
		$request->session()->regenerate();

		$user = $request->user();

		if (!in_array($user->profile_using, ['admin', 'super_admin'])) {
			$loginAs = $request->input('login_as');

			if (in_array($loginAs, ['trainer', 'trainee'])) {
				$hasProfile = $user->profiles()->where('title', $loginAs)->exists();
				if ($hasProfile) {
					$user->profile_using = $loginAs;
					$user->save();
				}
			}
		}

		return redirect()->intended('/dashboard');
	}

	/**
	 * Destroy an authenticated session.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}
}
