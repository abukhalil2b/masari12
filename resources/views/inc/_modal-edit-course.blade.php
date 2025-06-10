    <x-modal name="edit-course{{ $course->id }}" :show="false" focusable>
        <div class="pt-1 px-4 text-xl">
              تعديل الدورة
        </div>{{$errors->updateCourse->first('course_id')}}
        <form method="post" action="{{ route('admin.course.update',$course->id) }}" class="p-4">
            @csrf

            <div class="mt-2">
                <x-input-label for="title" value="العنوان" />

                <x-text-input id="title" name="title" type="title" class="w-full" value="{{ $course->title }}" />

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="aims" value="الأهداف" />
                <textarea name="aims" class="mt-1 h-20 rounded w-full border">{{ $course->aims }}</textarea>
                <x-input-error :messages="$errors->get('aims')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="description" value="الوصف" />
                <textarea name="description" class="mt-1 h-20 rounded w-full border">{{ $course->description }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
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