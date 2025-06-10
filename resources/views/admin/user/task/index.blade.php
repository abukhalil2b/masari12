<x-app-layout>
    <div class="p-3">


        @include('inc.task._modal_add_user_task')

        <div class="mt-4 card bg-orange-50 border border-orange-800 text-orange-800 text-xl">
        مهام: {{ $user->name }}
        </div>

        @foreach($tasks as $task)

        <div class="bordre-3 border-r mt-1 card shadow border">

            {!! nl2br($task->title) !!}


            <div class="mt-4 text-[9px]">

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

            <div class="flex gap-3">

            @include('inc.task._modal_update_user_task')
            @include('inc.task._modal_delete_user_task')

            </div>
        </div>

        @endforeach

    </div>
</x-app-layout>