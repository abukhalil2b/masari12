    <x-modal name="create-course" :show="$errors->courseStore->isNotEmpty() " focusable>
        <div class="pt-1 px-4 text-xl">
            دورة جديدة
        </div>
        <form method="post" action="{{ route('admin.course.store') }}" class="p-4">
            @csrf

            <div class="mt-2">
                <x-input-label for="title" value="العنوان" />

                <x-text-input id="title" name="title" type="title" class="w-full" />

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="aims" value="الأهداف" />
                <x-textarea name="aims" class="mt-1" />
                <x-input-error :messages="$errors->get('aims')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="description" value="الوصف" />
                <x-textarea name="description" class="mt-1" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <input type="hidden" name="program_id" value="{{ $program->id }}">
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