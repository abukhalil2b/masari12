<div x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-venue{{ $venue->id }}')" class="cursor-pointer text-xs">
    تعديل
</div>
<x-modal name="edit-venue{{ $venue->id }}" :show="$errors->isNotEmpty()" focusable>
    <form method="post" action="{{ route('admin.venue.update',$venue->id) }}" class="p-6">
        @csrf

        <div class="mt-2">
            <x-input-label for="title" value="اسم المكان" />

            <x-text-input id="title" name="title" type="text" value="{{ $venue->title }}" class="mt-1 w-full" />

            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-input-label for="place_link" value="رابط الموقع" />

            <x-text-input id="place_link" name="place_link" type="text" value="{{ $venue->place_link }}" class="mt-1 w-full" />

            <x-input-error :messages="$errors->get('place_link')" class="mt-2" />
        </div>

        <div class="mt-3 flex gap-3">

            <x-primary-button class="w-full" type="submit">
                حفظ
            </x-primary-button>
            <x-secondary-button class="w-full" x-on:click="$dispatch('close')">
                إلغاء
            </x-secondary-button>

        </div>
    </form>
</x-modal>