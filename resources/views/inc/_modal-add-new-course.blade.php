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

        <x-input-label for="category_id" value="التصنيف" />
        <select name="category_id" id="category_id"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->title }}
                </option>
            @endforeach
        </select>

        <x-input-label for="level_id" value="المستوى" />
        <select name="level_id" id="level_id"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach ($levels as $level)
                <option value="{{ $level->id }}">
                    {{ $level->title }}
                </option>
            @endforeach
        </select>

        <x-input-label for="trainer_id" value="المدرب" />
        <select name="trainer_id" id="trainer_id"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach ($trainers as $trainer)
                <option value="{{ $trainer->id }}">
                    {{ $trainer->name }}
                </option>
            @endforeach
        </select>

        <div class="mt-3 flex gap-3">
            <x-primary-button class="w-full" type="submit">حفظ</x-primary-button>
            <x-secondary-button class="w-full" x-on:click="$dispatch('close')">إلغاء</x-secondary-button>
        </div>
    </form>
</x-modal>
