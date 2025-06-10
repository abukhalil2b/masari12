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
            <x-input-label for="title" :value=" 'تعريف بسيط مثلا (مجاز في القراءات العشر)' " />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $user->detail->title)"  />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="phone" :value=" 'الهاتف' " />
            <x-text-input id="phone" name="phone" type="number" class="mt-1 block w-full" :value="old('phone', $user->detail->phone)" required />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
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