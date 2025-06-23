<x-app-layout>
    <div x-data="{ open: false }">
        <div class="p-3">
            <div class="flex items-center justify-between mb-4">
                <div class="text-xl text-red-800">التصنيفات</div>
                <button @click="open = true" class="bg-green-600 text-white px-4 py-2 rounded">+ تصنيف جديد</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($course_categories as $category)
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="p-4">
                            <div class="flex items-start justify-between">
                                <div>
                                    <a href="{{ route('admin.course_categories.show', $category->id) }}"
                                        class="text-lg font-bold text-gray-800 hover:text-blue-600">
                                        {{ $category->title }}
                                    </a>
                                    <div class="text-sm text-gray-500 mt-1">
                                        <span class="inline-block mr-2">المجموعة: <span
                                                class="font-medium">{{ $category->group }}</span></span>
                                        <span class="inline-block">الترتيب: <span
                                                class="font-medium">{{ $category->position }}</span></span>
                                    </div>
                                </div>
                                @if ($category->is_global)
                                    <span
                                        class="text-xs px-2 py-1 bg-blue-100 text-blue-700 font-semibold rounded-full">عام</span>
                                @endif
                            </div>

                            @if ($category->children->count())
                                <div class="mt-4 border-t pt-3">
                                    <div class="text-sm text-gray-700 font-semibold mb-1">التصنيفات الفرعية:</div>
                                    <ul class="space-y-1">
                                        @foreach ($category->children as $child)
                                            <li class="flex items-center space-x-2 rtl:space-x-reverse">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                                <a href="{{ route('admin.course_categories.show', $child->id) }}"
                                                    class="text-gray-700 hover:text-blue-600">
                                                    {{ $child->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Modal for new category -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="open = false" class="bg-white p-6 rounded-lg w-full max-w-lg">
                <div class="text-xl font-bold mb-4">إضافة تصنيف جديد</div>

                <form action="{{ route('admin.course_categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">الاسم</label>
                        <input name="title" type="text" class="w-full border px-3 py-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">المجموعة</label>
                        <input name="group" type="text" class="w-full border px-3 py-2 rounded" value="1"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">الترتيب</label>
                        <input name="position" type="number" class="w-full border px-3 py-2 rounded" value="1"
                            min="1" required>
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input name="is_global" type="checkbox" class="form-checkbox" checked>
                            <span class="ml-2">تصنيف عام</span>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">تصنيف رئيسي (اختياري)</label>
                        <select name="parent_id" class="w-full border px-3 py-2 rounded">
                            <option value="">بدون</option>
                            @foreach ($course_categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end gap-1 space-x-2">
                        <button type="button" @click="open = false"
                            class="px-4 py-2 bg-gray-300 rounded">إلغاء</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
