<section x-data="{show:false}">
    <div @click="show=true" class="font-bold cursor-pointer">
        تعديل البيانات الشخصية
    </div>

    <form x-show="show" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value=" 'الاسم الكامل (سيظهر في الشهادة كما كتب هنا)' " />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="first_name" :value="'الاسم الأول'" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="'القبيلة'"/>
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="about" :value=" 'تعريف بسيط مثلا (خبير في التنمية البشرية)' " />
            <x-text-input id="about" name="about" type="text" class="mt-1 block w-full" :value="old('about', $user?->detail?->about)"  />
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div>
            <x-input-label for="phone" :value=" 'الهاتف' " />
            <x-text-input id="phone" name="phone" type="number" class="mt-1 block w-full" :value="old('phone', $user->detail?->phone)" required />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="date_of_birth" :value=" 'تاريخ الميلاد' " />
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $user->detail?->date_of_birth)" />
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
                حفظ
            </x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">تم الحفظ</p>
            @endif
        </div>
    </form>
</section>