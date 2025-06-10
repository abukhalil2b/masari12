<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use HasApiTokens, Notifiable;

	protected $fillable = [
		'name',
		'status',
		'gender',
		'civil_id',
		'profile_using',
		'password',
		'plain_password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}

	public function profiles()
	{
		return $this->belongsToMany(Profile::class, 'user_profile', 'user_id', 'profile_id');
	}

	public function detail()
	{
		return $this->hasOne(UserDetail::class, 'user_id');
	}


	// Example of a helper to check if a user has a certain profile
	public function hasProfile(string $profileTitle): bool
	{
		return $this->profiles->contains('title', $profileTitle);
	}

	static function trainerIndex()
	{

		$users = DB::table('users')
			->leftjoin('user_details', 'users.id', '=', 'user_details.user_id')
			->leftjoin('user_profile', 'users.id', '=', 'user_profile.user_id')
			->join('profiles', 'user_profile.profile_id', '=', 'profiles.id')
			->select('users.id', 'users.civil_id', 'users.name', 'users.profile_using', 'users.plain_password', 'users.gender', 'profiles.title')
			->get();

		return $users->filter(fn($user) => $user->title == 'trainer');
	}

	public static function getTrainers()
    {
        // `whereHas` filters users that have a related 'profiles' entry with a 'slug' of 'trainer'.
        // `with('detail', 'profiles')` eagerly loads related data to prevent N+1 query issues.
        return User::whereHas('profiles', function ($query) {
            $query->where('title', 'trainer');
        })->with('detail', 'profiles')->get();
    }


	static function traineeIndex()
	{
		return DB::table('users')->join('user_profile', 'users.id', '=', 'user_profile.user_id')
			->select('users.id', 'users.name', 'users.profile_using', 'users.gender', 'users.civil_id')
			->where('user_profile.profile_id', 4)->get();
	}

	public static function getTrainees()
    {
        return User::whereHas('profiles', function ($query) {
            $query->where('title', 'trainee');
        })->with('detail', 'profiles')->get();
    }

	public function isAdmin(): bool
    {
        // This ensures flexibility: if 'profile_using' is set to 'admin', or if they have the 'admin' profile assigned.
        return $this->profile_using === 'admin' || $this->hasProfile('admin');
    }

	public function hasPermission($slug)
	{
		//TODO add user_permission table for individual permission

		$user = auth()->user();

		//let super_admin pass
		if ($user->profile_using == 'super_admin') {
			return true;
		}

		if ($user->profile_using == 'admin') {
			// we know from database that admin's profile has ID: 1
			$adminProfile = Profile::find(1);

			$hasPermission = $adminProfile->permissions()->where('slug', $slug)->first();

			if ($hasPermission) {
				return true;
			} else {
				return false;
			}
		}


		if ($user->profile_using == 'trainer') {

			// we know from database that trainer's profile has ID: 3
			$trainerProfile = Profile::find(3);

			$hasPermission = $trainerProfile->permissions()->where('slug', $slug)->first();

			if ($hasPermission) {
				return true;
			} else {
				return false;
			}
		}

		if ($user->profile_using == 'trainee') {

			// we know from database that trainee's profile has ID: 4
			$traineeProfile = Profile::find(4);

			$hasPermission = $traineeProfile->permissions()->where('slug', $slug)->first();

			if ($hasPermission) {
				return true;
			} else {
				return false;
			}
		}

		return false;
	}

	/**
	 public function hasPermission(string $permissionSlug): bool
    {
        // Retrieve the currently authenticated user instance.
        $user = auth()->user();

        // If no user is authenticated, they cannot have any permissions.
        if (!$user) {
            return false;
        }

        // --- Super Admin Bypass ---
        // A user explicitly designated as 'super_admin' bypasses all granular permission checks.
        // This role should be managed with extreme caution due to its extensive privileges.
        if ($user->profile_using === 'super_admin') {
            return true;
        }

        // --- Permission Check via Profiles ---
        // This query efficiently checks if *any* of the user's assigned profiles have the required permission.
        // `whereHas('profiles', ...)` filters users that have at least one profile...
        // `whereHas('permissions', ...)` filters those profiles that have at least one permission matching the slug.
        $hasPermission = $this->profiles()
                            ->whereHas('permissions', function ($query) use ($permissionSlug) {
                                $query->where('slug', $permissionSlug);
                            })->exists();

        return $hasPermission;
    }
	 */

	

	//-- impersonate --
	public function setImpersonating($user)
	{
		Session::put('impersonate_user_id', $user->id);
	}

	public function stopImpersonating()
	{
		Session::forget('impersonate_user_id');
	}

	public function isImpersonating()
	{
		return Session::has('impersonate_user_id');
	}

	public function isAdministrator()
	{
		return $this->profile_using == 'admin' ? true : false;
	}

	//[ ] only profile permissions
	public function getPermissions()
	{

		//[ ] get it as array to avoid null. also in future we may need to add more profiles
		$profileIds = DB::table('user_profile')
			->join('profiles', 'user_profile.profile_id', '=', 'profiles.id')
			->where(['profiles.title' => $this->profile_using, 'user_profile.user_id' => $this->id])
			->pluck('user_profile.profile_id');

		$permissionIdsSlugs = DB::table('profile_permission')
			->join('permissions', 'profile_permission.permission_id', '=', 'permissions.id')
			->whereIn('profile_permission.profile_id', $profileIds)
			->pluck('permissions.slug')
			->toArray();

		return $permissionIdsSlugs;
	}

	// public function getPermissions(): array
    // {
    //     // Find the specific profile record that matches the user's currently active 'profile_using' slug.
    //     $activeProfile = $this->profiles()->where('slug', $this->profile_using)->first();

    //     if ($activeProfile) {
    //         // If an active profile is found, pluck all associated permission slugs.
    //         return $activeProfile->permissions()->pluck('slug')->toArray();
    //     }

    //     // Return an empty array if no active profile is found or assigned to the user.
    //     return [];
    // }
}
