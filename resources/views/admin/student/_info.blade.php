<div class="px-2 py-4 flex justify-between panel">
    <div>
        <a href="{{ route('admin.user.trainee.show', $trainee->id) }}">
            <div class="flex gap-1 items-center">
                <div>
                    <img src="{{ $trainee->gender == 'male' ? asset('assets/images/avatar/avatar.png') : asset('assets/images/avatar/avatar-female.png') }}"
                        alt="" class="rounded-full w-8 h-8">
                </div>
                <div class="text-xl"> {{ $trainee->name }}</div>
            </div>
        </a>

        <div>{{ __($trainee->gender) }}</div>

        <div>
            <span class="text-blue-800 font-bold">الرقم المدني : </span>
            {{ $trainee->civil_id }}
        </div>
        <div>
            <span class="text-blue-800 font-bold">الهاتف : </span>
            {{ __($trainee->detail?->phone) }}
        </div>
    </div>
    <div class="text-gray-400 text-xs">
        تاريخ اليوم: {{ date('d-m-Y') }}
    </div>
</div>
