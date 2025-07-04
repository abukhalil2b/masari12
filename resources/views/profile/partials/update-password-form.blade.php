<section x-data="{show:false}">
    <div @click="show=true" class="font-bold cursor-pointer">
    تغير كلمة المرور
    </div>
    <div>
        

    <form x-show="show" method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="' كلمة المرور الحالية '" />
            <x-text-input id="current_password" name="current_password" type="text" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="' كلمة المرور الجديد '" />
            <x-text-input id="password" name="password" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="'تأكيد كلمة المرور'" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="text" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
                حفظ
            </x-primary-button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 ">تم الحفظ</p>
            @endif
        </div>
    </form>
</section>