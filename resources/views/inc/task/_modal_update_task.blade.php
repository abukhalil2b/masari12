<div>

    <div x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-update{{ $task->id }}')" class="cursor-pointer text-xs text-oranger-500">تحديث</div>

    <x-modal name="create-update{{ $task->id }}" :show="$errors->isNotEmpty()" focusable>

        <form action="{{ route('admin.task.update',$task->id) }}" method="POST" class="p-1">
            @csrf

            <div class="p-3">
                <div class="mt-2">
                    المهمة
                </div>

                <x-textarea name="title" class="h-32" value="{{ $task->title }}" />

                <button class="btn-secondary mt-2 h-10 w-full">
                    تحديث
                </button>

            </div>

        </form>

    </x-modal>
</div>