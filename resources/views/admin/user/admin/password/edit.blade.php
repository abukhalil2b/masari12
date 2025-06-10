<x-app-layout>
    <header class="p-3 w-full h-12 bg-white">
        تحديث الرقم السري
    </header>

    <div class="p-3">

        <form method="post" action="{{ route('admin.user.admin.password.update',$admin->id) }}" class="p-4">
            @csrf

            <div class="mt-3">
                {{ $admin->name }}
            </div>

            <div class="mt-3">
                <div>الرقم السري</div>
                <x-text-input name="password" type="text" class="mt-1 w-full" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" value />
            </div>

            <x-primary-button class="mt-4 w-full" type="submit">
                تحديث
            </x-primary-button>
        </form>

    </div>


</x-app-layout>