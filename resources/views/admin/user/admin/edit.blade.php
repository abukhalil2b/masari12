<x-app-layout>
    <header class="p-3 w-full h-12 bg-white">

    </header>

    <div class="p-3">

        <form method="post" action="{{ route('admin.user.admin.update',$admin->id) }}" class="p-4">
            @csrf

            <div class="mt-3">
                <x-input-label for="name" value="الاسم الكامل" />

                <x-text-input id="name" name="name" type="text" class="mt-1 w-full" value="{{ $admin->name }}" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="first_name" value="الاسم الأول" />

                @if($admindetail)
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 w-full" value="{{ $admindetail->first_name }}" />
                @else
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 w-full" />
                @endif

                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="last_name" value="القبيلة" />

                @if($admindetail)
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 w-full" value="{{ $admindetail->last_name }}" />
                @else
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 w-full" />
                @endif

                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="title" value=" تعريف بسيط مثلا (خبير في التنمية البشرية)" />

                @if($admindetail)
                <x-text-input id="title" name="title" type="text" class="mt-1 w-full" value="{{ $admindetail->title }}" />
                @else
                <x-text-input id="title" name="title" type="text" class="mt-1 w-full" />
                @endif

                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="phone" value="الهاتف" />

                @if($admindetail)
                <x-text-input id="phone" name="phone" type="number" class="mt-1 w-full" value="{{ $admindetail->phone }}" />
                @else
                <x-text-input id="phone" name="phone" type="number" class="mt-1 w-full" />
                @endif

                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="date_of_birth" value="تاريخ الميلاد" />

                @if($admindetail)
                <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 w-full" value="{{ $admindetail->date_of_birth }}" />
                @else
                <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 w-full" />
                @endif

                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>




            <x-primary-button class="mt-4 w-full" type="submit">
                حفظ
            </x-primary-button>
        </form>

    </div>


</x-app-layout>