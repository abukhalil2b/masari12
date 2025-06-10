<div>

    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-user-task')" class="text-xs">
        + مهمة جديدة
    </x-primary-button>


    <x-modal name="create-user-task" :show="$errors->isNotEmpty()" focusable>

        <form action="{{ route('admin.user.task.store') }}" method="POST" class="p-1">
            @csrf

            <div class="p-3">
                <div class="mt-2 text-red-800 text-xl">
                    مهمة لـ {{ $user->name }}
                </div>

                <x-textarea name="title" class="h-32" />
                
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                
                <div class="mt-5 flex gap-3">

                    <x-primary-button type="submit" class="w-full">
                    حفظ
                    </x-primary-button>

                    <x-secondary-button class="w-full" x-on:click="$dispatch('close')">
                        إلغاء
                    </x-secondary-button>

                </div>

            </div>

        </form>


    </x-modal>
</div>