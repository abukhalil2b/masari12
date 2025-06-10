<div>

    <div x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-task{{ $task->id }}')" class="cursor-pointer text-xs text-red-800">حذف</div>

    <x-modal name="delete-task{{ $task->id }}" :show="$errors->isNotEmpty()" focusable>

        <form action="{{ route('admin.task.delete',$task->id) }}" method="POST" class="p-1">
            @csrf

            <div class="p-3">
                <div class="mt-2 text-red-800 text-xl">
                    هل أنت متأكد
                </div>

                <div class="mt-5 flex gap-3">

                    <x-danger-button type="submit" class="w-full">
                        تأكيد الحذف
                    </x-danger-button>

                    <x-secondary-button class="w-full" x-on:click="$dispatch('close')">
                        إلغاء
                    </x-secondary-button>

                </div>

            </div>

        </form>


    </x-modal>
</div>