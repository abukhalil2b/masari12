<x-app-layout>
    <div class="p-3 flex flex-col gap-5">
        <div class="card">
            {{ $trainer->name }}
        </div>


        <div class="card">
            عدد الحلقات التي سيتم حذف المدرب منها
            {{ $trainerCircleCount }}
        </div>


        <div class="card">
            عدد البرامج التي سيتم حذف المدرب منها
            {{ $trainerProgramCount }}
        </div>

        <a class="p-2 w-32 text-center rounded mt-5 text-red-50 bg-red-600 border-red-800 hover:bg-red-400" href="{{ route('admin.user.trainer.delete',$trainer->id) }}">
            تأكيد الحذف
        </a>

    </div>
</x-app-layout>