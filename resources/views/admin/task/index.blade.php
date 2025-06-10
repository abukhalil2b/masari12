<x-app-layout>

    @include('inc.task._modal_add_task')

    @foreach($tasks as $task)

    <div class="mt-1 bordre-3 border rounded bg-white">

        <div class="p-2">
            {!! nl2br($task->title) !!}
        </div>

        <div class="p-2 mt-4 text-[9px]">

            <i class="text-gray-400">
                كتبت بتاريخ: {{ $task->created_at }}
            </i>
            .
            @if($task->updated_at)
            <i class="mr-2 text-red-900">
                تم التحديث بتاريخ: {{ $task->updated_at }}
            </i>
            @endif
        </div>

        <hr class="mt-4 p-3">

        <div class="p-2 flex gap-3">

            @include('inc.task._modal_update_task')
            @include('inc.task._modal_delete_task')

        </div>

    </div>

    @endforeach

</x-app-layout>