<x-app-layout>
    <div class="py-4">
        <div class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden mb-6">
            <div
                class="bg-orange-50 text-orange-700 p-4 shadow-md {{ $course->status == 'disable' ? 'opacity-50' : '' }}">
                <h3 class="text-lg font-bold text-center">{{ $course->title }}</h3>
            </div>

            <div class="p-4 space-y-3">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">courseCategory:</div>
                    <div class="col-span-9 text-gray-600">{{ $course->courseCategory->name }}</div>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3 bg-gray-100 p-3 font-semibold rounded">courseLevel:</div>
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


        <div class="grid grid-cols-12 gap-4">
            @foreach ($course->courseLessons as $lesson)
                <div class="col-span-9 text-gray-600">{{ $lesson->title }}</div>
            @endforeach
        </div>

        <div class="grid grid-cols-12 gap-4">
            @foreach ($course->courseTrainees as $rainee)
                <div class="col-span-9 text-gray-600">{{ $rainee->name }}</div>
            @endforeach
        </div>

        <div class="grid grid-cols-12 gap-4">
            @foreach ($course->courseTrainers as $trainer)
                <div class="col-span-9 text-gray-600">{{ $trainer->name }}</div>
            @endforeach
        </div>
    </div>
</x-app-layout>
