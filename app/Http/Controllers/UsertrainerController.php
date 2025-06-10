<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsertrainerController extends Controller
{

    public function trainerShow(User $user)
    {
        $hisProfiles = $user->profiles;

        $profileIds =  $hisProfiles->pluck('id')->toArray();

        // add admin and father prfile to array
        array_push($profileIds, 1);

        $availableProfiles = Profile::whereNotIn('id', $profileIds)->get();

        return view('admin.user.trainer.show', compact('user', 'hisProfiles', 'availableProfiles'));
    }

    public function trainerIndex()
    {
        //TODO check permission for trainers

        //only for admin 
        $trainers = User::whereHas('profiles', function ($query) {
            $query->where('user_profile.profile_id', 2);
        })->get();

        return view('admin.user.trainer.index', [
            'trainers' => $trainers,
            'profile_using' => 'trainer'
        ]);
    }


    public function trainerEdit(User $trainer)
    {

        //find trainer detail and update or insert new trainer.
        $trainerdetail = DB::table('user_details')->where('user_id', $trainer->id)->first();

        return view('admin.user.trainer.edit', compact('trainer', 'trainerdetail'));
    }

    public function trainerUpdate(Request $request, User $trainer)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required|max:8'
        ]);
        
        $trainer->update([
            'name' => $request->name
        ]);

        //find trainer detail and update or insert new trainer.
        $trainerdetail = DB::table('user_details')->where('user_id', $trainer->id)->first();

        if ($trainerdetail) {
            //update
            DB::table('user_details')->where('user_id', $trainer->id)->update([
                'about' => $request->about,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
            ]);
        } else {
            //new trainer
            DB::table('user_details')->insert([
                'about' => $request->about,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
                'user_id' => $trainer->id
            ]);
        }


        return redirect()->route('admin.user.trainer.index');
    }



    public function trainerPasswordEdit(User $trainer)
    {
        return view('admin.user.trainer.password.edit', compact('trainer'));
    }

    public function trainerPasswordUpdate(Request $request, User $trainer)
    {
        $trainer->password = Hash::make($request->password);

        $trainer->plain_password = $request->password;

        $trainer->save();

        return redirect(route('admin.user.trainer.index'));
    }
}
