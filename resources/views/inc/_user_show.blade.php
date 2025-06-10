<div class="p-3 ">
    <div class="flex gap-1 items-center">
        <div>
            <img src="{{ $user->gender == 'male' ? asset('assets/images/avatar/avatar.png') : asset('assets/images/avatar/avatar-female.png') }}" alt="" class="rounded-full w-8 h-8">
        </div>
        <div class="text-xl"> {{ $user->name }}</div>
    </div>

    <div class="text-sm">
        مسجل الدخول بحساب:
        <span class="text-orange-600">{{ __($user->profile_using) }}</span>
    </div>
    <div class="text-sm text-orange-600"> {{ __($user->gender) }}</div>
    <div class="text-sm ">
        الرقم المدني:
        <span class="text-orange-600">{{ $user->civil_id }}</span>
    </div>
    <div class="text-sm ">
          تاريخ الإنضمام:
        <span class="text-orange-600">{{ Str::substr($user->created_at,0,10)}}</span>
    </div>
</div>

<div class="mt-3 text-orange-600">
    الحسابات التي يمتلكها
</div>
<div class="mt-1 flex gap-3">
    @foreach($hisProfiles as $profile)
    <div>
        <div class="panel w-20 text-center bg-orange-100 border border-orange-600 text-xs"> {{ __($profile->title) }}</div>
        <div class="mt-2 w-20 text-center text-xs">
            <a href="{{ route('admin.profile.remove_account_show_form',['user'=>$user->id,'profile'=>$profile->id]) }}" class="mt-4">
                إزالة
            </a>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-5 text-orange-600">
    الحسابات التي يمكن اضافتها
</div>
<div class="mt-1 flex gap-3">
    @foreach($availableProfiles as $profile)
    <div>
        <div class="panel w-20 text-center bg-orange-100 border border-orange-600 text-xs"> {{ __($profile->title) }}</div>
        <div class="mt-2 w-20 text-center text-xs">
            <a href="{{ route('admin.profile.add_account_show_form',['user'=>$user->id,'profile'=>$profile->id]) }}">
                إضافة
            </a>
        </div>
    </div>
    @endforeach
</div>