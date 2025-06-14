<section>
    <div>
        التبديل بين الحسابات
    </div>

        <div class="mt-2 flex gap-1">
            @foreach($user->profiles as $profile)

            <a href="{{ route('switch-account',$profile->id) }}" class="option w-16 {{ $user->profile_using ==  $profile->title ? 'option-selected' : ''}}">
                {{ __($profile->title) }}
            </a>

            @endforeach

        </div>

</section>