<x-app-layout>
    <div class="p-6 max-w-2xl mx-auto" x-data="{ editMode: false }">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-red-800">تفاصيل التصنيف</h2>
            <button @click="editMode = !editMode" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                <span x-text="editMode ? 'إلغاء' : 'تعديل التصنيف'"></span>
            </button>
        </div>

        <!-- Display Mode -->
        <div x-show="!editMode" class="bg-white border rounded-xl shadow-sm p-6 space-y-4">
            <div>
                <span class="font-semibold text-gray-700">الاسم:</span>
                <span class="text-gray-800">{{ $courseCategory->title }}</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">المجموعة:</span>
                <span class="text-gray-800">{{ $courseCategory->group }}</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">الترتيب:</span>
                <span class="text-gray-800">{{ $courseCategory->position }}</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700">النوع:</span>
                @if ($courseCategory->is_global)
                    <span class="text-blue-700 font-semibold">عام</span>
                @else
                    <span class="text-gray-600">خاص</span>
                @endif
            </div>
        </div>

        <!-- Edit Form -->
        <div x-show="editMode" class="bg-white border rounded-xl shadow-sm p-6 mt-4">
            <form action="{{ route('admin.course_categories.update', $courseCategory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">الاسم</label>
                    <input type="text" name="title" value="{{ old('title', $courseCategory->title) }}"
                        class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">المجموعة</label>
                    <input type="text" name="group" value="{{ old('group', $courseCategory->group) }}"
                        class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">الترتيب</label>
                    <input type="number" name="position" value="{{ old('position', $courseCategory->position) }}"
                        class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="hidden" name="is_global" value="0"> {{-- Ensure false is sent if unchecked --}}
                        <input type="checkbox" name="is_global" value="1" class="form-checkbox"
                            {{ old('is_global', $courseCategory->is_global) ? 'checked' : '' }}>
                        <span class="ml-2">تصنيف عام</span>
                    </label>
                </div>


                <div class="flex justify-end gap-1 space-x-2">
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">حفظ</button>
                    <button type="button" @click="editMode = false"
                        class="bg-gray-300 px-4 py-2 rounded">إلغاء</button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
