<x-app-layout>
    <div class="py-4">
        <div class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden mb-6">
            <div
                class="bg-orange-50 text-orange-700 p-4 shadow-md {{ $course->status == 'disable' ? 'opacity-50' : '' }}">
                <h3 class="text-lg font-bold text-center">{{ $course->title }}</h3>
                <a href="{{ route('admin.course.edit', $course->id) }}">
                    تعديل
                </a>
            </div>

            <div class="p-4 space-y-3">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">تصنيف الدورة:</div>
                    <div class="col-span-9 text-gray-600">{{ $course->courseCategory->title }}</div>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">مستوي الدورة:</div>
                    <div class="col-span-9 text-gray-600">{{ $course->courseLevel->title }}</div>
                </div>


                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">الوصف:</div>
                    <div class="col-span-9 text-gray-600">{{ $course->description }}</div>
                </div>
                @if ($course->registration_type !== 'at_period')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">تاريخ بدء التسجيل:</div>
                        <div class="col-span-9 text-gray-600">{{ $course->registration_start_at ?? 'غير محدد' }}
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">تاريخ انتهاء التسجيل:</div>
                        <div class="col-span-9 text-gray-600">{{ $course->registration_end_at ?? 'غير محدد' }}</div>
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">تاريخ بداية الدورة:</div>
                        <div class="col-span-9 text-gray-600">{{ $course->course_start_at ?? 'غير محدد' }}</div>
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">تاريخ نهاية الدورة:</div>
                        <div class="col-span-9 text-gray-600">{{ $course->course_end_at ?? 'غير محدد' }}</div>
                    </div>
                @endif

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">السعة القصوى:</div>
                    <div class="col-span-9 text-gray-600">{{ $course->max_capacity ?? 'غير محدد' }}</div>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">السعر:</div>
                    <div class="col-span-9 text-gray-600 font-bold">{{ $course->price }} OMR</div>
                </div>
            </div>
        </div>



        <form action="{{ route('admin.course_weeks_and_lessons.store', $course->id) }}" method="POST"
            x-data="courseBuilder()" class="space-y-6">
            @csrf

            <template x-for="(week, wIndex) in weeks" :key="wIndex">
                <div class="p-4 border rounded bg-gray-50">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold text-blue-700">أسبوع <span x-text="wIndex + 1"></span></h3>
                        <button type="button" @click="removeWeek(wIndex)" class="text-red-500">🗑️</button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <input type="text" :name="`weeks[${wIndex}][title]`" class="p-2 border rounded"
                            placeholder="عنوان الأسبوع" required>
                        <input type="number" :name="`weeks[${wIndex}][order]`" class="p-2 border rounded"
                            placeholder="ترتيب الأسبوع" value="0">
                    </div>
                    <textarea :name="`weeks[${wIndex}][description]`" class="w-full mt-2 p-2 border rounded" placeholder="الوصف (اختياري)"></textarea>

                    <!-- Lessons -->
                    <div class="mt-4 space-y-4">
                        <template x-for="(lesson, lIndex) in week.lessons" :key="lIndex">
                            <div class="bg-white p-3 border rounded">
                                <div class="flex justify-between">
                                    <strong>درس <span x-text="lIndex + 1"></span></strong>
                                    <button type="button" @click="removeLesson(wIndex, lIndex)"
                                        class="text-sm text-red-500">🗑️</button>
                                </div>

                                <input type="text" :name="`weeks[${wIndex}][lessons][${lIndex}][title]`"
                                    class="w-full mt-2 p-2 border rounded" placeholder="عنوان الدرس" required>

                                <select :name="`weeks[${wIndex}][lessons][${lIndex}][type]`"
                                    class="w-full mt-2 p-2 border rounded">
                                    <option value="text">نص</option>
                                    <option value="video">فيديو</option>
                                    <option value="live">بث مباشر</option>
                                    <option value="file">ملف</option>
                                    <option value="quiz">اختبار</option>
                                </select>

                                <input type="text" :name="`weeks[${wIndex}][lessons][${lIndex}][url]`"
                                    class="w-full mt-2 p-2 border rounded" placeholder="رابط / محتوى (اختياري)">
                            </div>
                        </template>
                        <button type="button" @click="addLesson(wIndex)"
                            class="mt-2 px-3 py-1 bg-green-600 text-white rounded text-sm">
                            ➕ إضافة درس
                        </button>
                    </div>
                </div>
            </template>

            <div class="mt-4 flex justify-between items-center">
                <button type="button" @click="addWeek()" class="px-4 py-2 bg-blue-700 text-white rounded">
                    ➕ إضافة أسبوع جديد
                </button>

                <button type="submit" class="px-6 py-2 bg-indigo-700 text-white rounded">
                    💾 حفظ
                </button>
            </div>
        </form>


        <h1 class="text-xl text-red-800 card mt-1">الدروس</h1>
        <div class="grid grid-cols-12 gap-4">
            @foreach ($course->courseWeeks as $week)
                <div class="mt-6 border-t pt-4 col-span-12">
                    <h3 class="font-bold text-lg text-blue-700">{{ $week->title }}</h3>

                    @foreach ($week->courseLessons as $lesson)
                        <div class="ml-4 text-gray-700">• {{ $lesson->title }} ({{ $lesson->type }})</div>
                    @endforeach

                    <form action="{{ route('admin.course_lessons.store', $course->id) }}" method="POST"
                        class="mt-4 p-4 border rounded bg-gray-50">
                        @csrf
                        <input type="hidden" name="course_week_id" value="{{ $week->id }}">

                        <div class="mb-2">
                            <label class="block text-sm text-gray-700">عنوان الدرس</label>
                            <input type="text" name="title" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-2">
                            <label class="block text-sm text-gray-700">نوع الدرس</label>
                            <select name="type" class="w-full border rounded p-2" required>
                                <option value="text">نص</option>
                                <option value="video">فيديو</option>
                                <option value="live">بث مباشر</option>
                                <option value="file">ملف</option>
                                <option value="quiz">اختبار</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="block text-sm text-gray-700">محتوى أو رابط (اختياري)</label>
                            <textarea name="content" class="w-full border rounded p-2"></textarea>
                            <input type="url" name="url" class="w-full mt-2 border rounded p-2"
                                placeholder="رابط الفيديو أو الملف">
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            إضافة الدرس
                        </button>
                    </form>
                </div>
            @endforeach
        </div>



        <h1 class="text-xl text-red-800 card mt-1">المدرب</h1>
        <div class="grid grid-cols-12 gap-4">
            @foreach ($course->trainers as $trainer)
                <div class="col-span-9 text-gray-600 pb-2">{{ $trainer->name }}</div>
            @endforeach
        </div>

        <h1 class="text-xl text-red-800 card mt-1">المتدربين</h1>
        <div class="grid grid-cols-12 gap-4">
            @foreach ($course->trainees as $rainee)
                <div class="col-span-9 text-gray-600 pb-2">{{ $rainee->name }}</div>
            @endforeach
        </div>

    </div>
</x-app-layout>
<script>
    function courseBuilder() {
        return {
            weeks: [],
            addWeek() {
                this.weeks.push({
                    title: '',
                    order: 0,
                    description: '',
                    lessons: []
                });
            },
            removeWeek(index) {
                this.weeks.splice(index, 1);
            },
            addLesson(weekIndex) {
                this.weeks[weekIndex].lessons.push({
                    title: '',
                    type: 'text',
                    url: ''
                });
            },
            removeLesson(weekIndex, lessonIndex) {
                this.weeks[weekIndex].lessons.splice(lessonIndex, 1);
            }
        }
    }
</script>
