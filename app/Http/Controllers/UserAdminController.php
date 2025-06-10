<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{

    public function adminShow(User $user)
    {
        $hisProfiles = $user->profiles;

        $hisProfileIds =  $hisProfiles->pluck('id')->toArray();

        // add admin and father prfile to array
        array_push($hisProfileIds, 1, 5);

        $availableProfiles = Profile::whereNotIn('id', $hisProfileIds)->get();

        return view('admin.user.admin.show', compact('user', 'hisProfiles', 'availableProfiles'));
    }

    public function adminIndex()
    {
        //TODO check permission for admins

        //only for admin 
        $admins = User::whereHas('profiles', function ($query) {
            $query->where('user_profile.profile_id', 1);
        })->get();

        return view('admin.user.admin.index', [
            'admins' => $admins,
            'profile_using' => 'admin'
        ]);
    }

    
    public function adminEdit(User $admin)
    {

        //find admin detail and update or insert new admin.
        $admindetail = DB::table('user_details')->where('user_id', $admin->id)->first();

        return view('admin.user.admin.edit', compact('admin', 'admindetail'));
    }

    public function adminUpdate(Request $request, User $admin)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required|max:8'
        ]);

        $admin->update([
            'name' => $request->name,
        ]);

        //find admin detail and update or insert new admin.
        $admindetail = DB::table('user_details')->where('user_id', $admin->id)->first();

        if ($admindetail) {
            //update
            DB::table('user_details')->where('user_id', $admin->id)->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
            ]);
        } else {
            //new admin
            DB::table('user_details')->insert([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
                'user_id' => $admin->id
            ]);
        }


        return redirect()->route('admin.user.admin.index');
    }



    public function adminPasswordEdit(User $admin)
    {
        return view('admin.user.admin.password.edit', compact('admin'));
    }

    public function adminPasswordUpdate(Request $request, User $admin)
    {
        $admin->password = Hash::make($request->password);

        $admin->plain_password = $request->password;

        $admin->save();

        return redirect(route('admin.user.admin.index'));
    }
}
