<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsertraineeController extends Controller
{

    public function traineeShow(User $user)
    {
        $hisProfiles = $user->profiles;

        $hisProfileIds =  $hisProfiles->pluck('id')->toArray();

        // add admin and father Profile to array
        array_push($hisProfileIds, 1, 5);

        $availableProfiles = Profile::whereNotIn('id', $hisProfileIds)->get();

        return view('admin.user.trainee.show', compact('user', 'hisProfiles', 'availableProfiles'));
    }

    public function traineeIndex(Request $request)
    {
    
        $trainees = User::where('user_profile.profile_id', 3)
            ->select('users.id', 'users.name', 'users.gender', 'users.civil_id', 'user_details.phone', 'user_details.about')
            ->join('user_profile', 'users.id', 'user_profile.user_id')
            ->leftjoin('user_details', 'users.id', 'user_details.user_id')
            ->orderby('name', 'asc')
            ->get();

        // return    $trainees;
        return view('admin.user.trainee.index', [
            'trainees' => $trainees,
            'profile_using' => 'trainee'
        ]);
    }


    public function traineeEdit(User $trainee)
    {

        //find trainee detail and update or insert new trainee.
        $traineedetail = DB::table('user_details')->where('user_id', $trainee->id)->first();

        return view('admin.user.trainee.edit', compact('trainee', 'traineedetail'));
    }

    public function traineeUpdate(Request $request, User $trainee)
    {
        // return $request->all();
        // return $request->gender;
        // return $trainee;

        $request->validate([
            'name' => 'required',
            'phone' => 'required|max:8'
        ]);

        $trainee->update([
            'name' => $request->name,
            'gender' => $request->gender
        ]);

        //find trainee detail and update or insert new trainee.
        $traineedetail = DB::table('user_details')->where('user_id', $trainee->id)->first();

        if ($traineedetail) {
            //update
            DB::table('user_details')->where('user_id', $trainee->id)->update([
                'about' => $request->about,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
            ]);
        } else {
            //new trainee
            DB::table('user_details')->insert([
                'about' => $request->about,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
                'user_id' => $trainee->id
            ]);
        }

        return redirect()->route('admin.user.trainee.index');
    }

    public function traineeStore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'civil_id' => 'required',
            'phone' => 'required',
        ]);

        $exist = User::where('civil_id', $request->civil_id)->first();

        if ($exist) {
            return redirect()->route('admin.user.trainee.show', $exist->id);
        }

        $user = User::create([
            'password' => Hash::make($request->password),
            'plain_password' => $request->password,
            'civil_id' => $request->civil_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'profile_using' => 'trainee'
        ]);

        DB::table('user_profile')->insert([
            'user_id' => $user->id,
            'profile_id' => 4
        ]);

        DB::table('user_details')->insert([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return back();
    }

  
    public function traineePasswordEdit(User $trainee)
    {
        return view('admin.user.trainee.password.edit', compact('trainee'));
    }

    public function traineePasswordUpdate(Request $request, User $trainee)
    {
        $trainee->password = Hash::make($request->password);

        $trainee->plain_password = $request->password;

        $trainee->save();

        return redirect()->route('admin.user.trainee.show',$trainee->id);
    }
}
