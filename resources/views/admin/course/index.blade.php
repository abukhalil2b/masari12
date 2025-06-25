<x-app-layout>
    <!-- Modal for new course -->
    @include('inc._modal-add-new-course')

    <div class="py-4">
        <form method="GET" action="{{ route('admin.course.index') }}" class="mb-4">
           <div class="flex gap-3 items-center justify-end">
             <label for="category" class="font-bold">اختر الفئة:</label>
            <select name="category_id" id="category" class="border p-2 rounded w-40">
                <option value="">كل الفئات</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">تصفية</button>
           </div>
        </form>
        <table class="table table-striped border rounded-lg shadow-sm">
            <thead class="bg-orange-100 text-orange-900">
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>الفئة</th>
                    <th>النوع</th>
                    <th>الحالة</th>
                    <th>المدرب</th>
                    <th>تاريخ بداية الدورة</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $key => $course)
                    <tr class="p-4">
                        <td>{{ $key + 1 }}</td>
                        <td class="font-bold">{{ $course->title }}</td>
                        <td>{{ $course->courseCategory->title }}</td>
                        <td>{{ __($course->registration_type) }}</td>
                        <td class="{{ $course->status == 'published' ? 'text-green-600' : 'text-red-600' }}">
                            {{ __($course->status) }}</td>
                        <td>
                            @foreach($course->trainers as $trainer )
                            <div>{{ $trainer->name }}</div>
                            @endforeach
                        </td>
                        <td>{{ $course->course_start_at ? Str::substr($course->course_start_at, 0, 11) : 'غير محدد' }}</td>
                        <td>
                            <a href="{{ route('admin.course.show', $course->id) }}"
                                class="btn btn-sm btn-info flex gap-2">
                                <x-svgicon.book />
                                <span>التفاصيل</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>
