<x-app-layout>
    <div class="p-3 flex flex-col gap-5">
        <div class="card">
            {{ $course->title }}
        </div>

        <div class="card">
            عدد الحلقات التي سيتم حذفها  
            {{ $circleCount }}
        </div>


        <div class="card">
            عدد المتدربين الذين سيتم حذفهم من الحلقات
            {{ $circletraineeCount }}
        </div>

        <a class="p-2 w-32 text-center rounded mt-5 text-red-50 bg-red-600 border-red-800 hover:bg-red-400" href="{{ route('admin.course.delete',$course->id) }}">
            تأكيد الحذف
        </a>

    </div>
</x-app-layout>