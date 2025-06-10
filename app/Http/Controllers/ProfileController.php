<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{

    public function edit(Request $request)
    {
        $loggedUser = auth()->user();

        $studntProfile =  DB::table('user_profile')
            ->where(['user_id' => $loggedUser->id, 'profile_id' => 4])->first();

        return view('profile.edit', [
            'user' => $request->user(),
            'studntProfile' => $studntProfile
        ]);
    }


    public function update(Request $request)
    {
        // return $request->all();

        $user = User::findOrfail($request->user()->id);

        $userDetail = DB::table('user_details')
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$userDetail) {
            DB::table('user_details')->insert([
                'about' => $request->about,
                'date_of_birth' => $request->date_of_birth,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'user_id' => $request->user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {

            DB::table('user_details')
                ->where('user_id', $request->user()->id)
                ->update([
                    'about' => $request->about,
                    'date_of_birth' => $request->date_of_birth,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'user_id' => $request->user()->id,
                    'updated_at' => now(),
                ]);
        }

        if($request->name){
            $user->name = $request->name;
            $user->save();
        }

        return back()->with(['status' => 'success', 'message' => 'profile-updated']);
    }

    public function switchAccount(Profile $profile)
    {
        $user = auth()->user();

        $userProfile = DB::table('user_profile')
            ->where(['user_id' => $user->id, 'profile_id' => $profile->id])
            ->first();

        if ($userProfile) {

            $user->profile_using = $profile->about;

            $user->save();

            return back();
        }

        abort(403);
    }

    public function addAccountShowForm(User $user, Profile $profile)
    {

        return view('admin.profile.add_account_show_form', compact('user', 'profile'));
    }

    public function addAccount(User $user, $about)
    {
        $allowedProfiles = ['trainer', 'trainee'];

        if (!in_array($about, $allowedProfiles)) {
            abort(403, 'لا يمكن اضافة هذا الحساب');
        }

        //validate prifle about
        $profile = Profile::where('about', $about)->first();

        if ($profile) {

            $exist = $user->profiles->where('id', $profile->id)->first();

            if ($exist) {

                abort(403);
            } else {
                DB::table('user_profile')->insert([
                    'user_id' => $user->id,
                    'profile_id' => $profile->id
                ]);
            }
        }


        $profileUsing = User::findOrFail($user->id)->profile_using;

        $routeName = 'admin.user.' . $profileUsing . '.show';

        return redirect()->route($routeName, $user->id);
    }

    public function addtraineeAccount()
    {

        $loggedUser = auth()->user();

        $studntProfile =  DB::table('user_profile')
            ->where([
                'user_id' => $loggedUser->id,
                'profile_id' => 4
            ])->first();

        //if user has already a trainee account
        if ($studntProfile) {
            abort(403);
        }

        if ($loggedUser->id == 1) {
            abort(403);
        }

        DB::table('user_profile')
            ->insert([
                'user_id' => $loggedUser->id,
                'profile_id' => 4
            ]);

        $loggedUser->profile_using = 'trainee';

        $loggedUser->save();

        return back();
    }

    public function removeAccountShowForm(User $user, Profile $profile)
    {

        $exist = DB::table('user_profile')->where([
            'user_id' => $user->id,
            'profile_id' => $profile->id
        ])->first();

        if (!$exist) {

            abort(403, $user->name . ' dose not has this profile');
        }

        return view('admin.profile.remove_account_show_form', compact('user', 'profile'));
    }

    public function removeAccount(User $user, Profile $profile)
    {

        //we do not allow to remove admin profile
        if ($profile->about == 'admin') {
            abort(403, 'لا يمكن إزالة هذا الحساب');
        }

        //get user's profile ids
        $userProfileIds = DB::table('user_profile')
            ->where(['user_id' => $user->id])
            ->pluck('profile_id')
            ->toArray();

        // validate
        $exist = DB::table('user_profile')
            ->where([
                'user_id' => $user->id,
                'profile_id' => $profile->id
            ])->first();

        if (!$exist) {

            abort(403);

            // profile not exist
        } else {

            //user at least has one profile, so do not allow to delete last one.
            if (count($userProfileIds) > 1) {

                // Delete
                DB::table('user_profile')
                    ->where([
                        'user_id' => $user->id,
                        'profile_id' => $profile->id
                    ])->delete();

                // if user was using deleted profile then we need change it with one of his profile
                if ($profile->about == $user->profile_using) {

                    //get available profile ids after deleting
                    $userProfileIds = DB::table('user_profile')
                        ->where(['user_id' => $user->id])
                        ->pluck('profile_id')
                        ->toArray();

                    //find one of them
                    $profile = Profile::find($userProfileIds[0]);

                    //set it as his profile
                    User::where('id', $user->id)->update([
                        'profile_using' => $profile->about
                    ]);
                }
            }
        }

        $profileUsing = User::findOrFail($user->id)->profile_using;

        $routeName = 'admin.user.' . $profileUsing . '.show';

        return redirect()->route($routeName, $user->id);
    }
}
