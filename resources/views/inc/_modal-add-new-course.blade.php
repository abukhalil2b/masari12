<button class="btn btn-secondary" x-on:click.prevent="$dispatch('open-modal', 'create-course')">
    + دورة
</button>
<x-modal name="create-course" :show="$errors->courseStore->isNotEmpty()" focusable x-data="{ open: true }"
    x-on:click.away="setTimeout(() => $dispatch('close'), 100)">
    <div class="pt-1 px-4 text-xl font-bold">
        دورة جديدة
    </div>
    <form method="post" action="{{ route('admin.course.store') }}" class="p-4">
        @csrf

        <div class="mt-2">
            <x-input-label for="title" value="العنوان" />
            <x-text-input id="title" name="title" type="text" class="w-full" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-input-label for="description" value="الوصف" />
            <x-textarea id="description" name="description" class="w-full mt-1" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <x-select name="language" :options="['ar' => 'العربية', 'en' => 'English']" />

        <x-select name="status" :options="['published' => 'منشور', 'draft' => 'مسودة']" />

        <x-select name="registration_type" :options="['open' => 'مفتوح', 'at_period' => 'بفترة محددة']" />


        <div id="date-fields" class="mt-2"
            x-show="document.getElementById('registration_type')?.value !== 'at_period'">
            <x-input-label for="registration_start_at" value="تاريخ بدء التسجيل" />
            <x-text-input id="registration_start_at" name="registration_start_at" type="datetime-local"
                class="w-full mt-1" />
            <x-input-error :messages="$errors->get('registration_start_at')" class="mt-2" />

            <x-input-label for="registration_end_at" value="تاريخ انتهاء التسجيل" />
            <x-text-input id="registration_end_at" name="registration_end_at" type="datetime-local"
                class="w-full mt-1" />
            <x-input-error :messages="$errors->get('registration_end_at')" class="mt-2" />

            <x-input-label for="course_start_at" value="تاريخ بداية الدورة" />
            <x-text-input id="course_start_at" name="course_start_at" type="datetime-local" class="w-full mt-1" />
            <x-input-error :messages="$errors->get('course_start_at')" class="mt-2" />

            <x-input-label for="course_end_at" value="تاريخ نهاية الدورة" />
            <x-text-input id="course_end_at" name="course_end_at" type="datetime-local" class="w-full mt-1" />
            <x-input-error :messages="$errors->get('course_end_at')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-input-label for="max_capacity" value="السعة القصوى" />
            <x-text-input id="max_capacity" name="max_capacity" type="number" class="w-full mt-1" />
            <x-input-error :messages="$errors->get('max_capacity')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-input-label for="price" value="السعر (OMR)" />
            <x-text-input id="price" name="price" type="number" step="0.001" class="w-full mt-1" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div class="mt-3 flex gap-3">
            <x-primary-button class="w-full" type="submit">حفظ</x-primary-button>
            <x-secondary-button class="w-full" x-on:click="$dispatch('close')">إلغاء</x-secondary-button>
        </div>
    </form>
</x-modal>
