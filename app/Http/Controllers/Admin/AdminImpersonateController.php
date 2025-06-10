<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;

class AdminImpersonateController extends Controller
{


    //impersonate
    public function enableImpersonate(User $user)
    {

        // Guard against administrator impersonate
        if (!$user->isAdministrator()) {
            auth()->user()->setImpersonating($user);
        } else {
            abort(403, 'لايمكن الدخول إلى هذا الحساب');
        }

        return redirect()->route('dashboard');
    }

    public function disableImpersonate()
    {
        auth()->user()->stopImpersonating();

        return redirect()->route('dashboard');
    }

}
