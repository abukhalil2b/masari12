<x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'remove-trainee{{$circletraineeJoined->circle_trainee_id}}')" class="w-32 text-center text-xs">
    إزالة من الحلقة
</x-primary-button>

<x-modal name="remove-trainee{{$circletraineeJoined->circle_trainee_id}}" :show="$errors->isNotEmpty()" focusable>

    <form action="{{ route('admin.circle.trainee.remove') }}" method="post">
        @csrf

        <div class="p-5">
            <div>
                <span class="text-red-400">تأكيد إزالة</span>
                {{ $circletraineeJoined->traineeName }}
                <span class="text-red-400">من الحلقة</span>
            </div>

            <div class="py-6">
                <div class="py-1">يمكنك ذكر السبب</div>
                <input type="text" name="delete_note" class="form-input">
            </div>
            <div class="mt-5 flex gap-3">

                <x-danger-button type="submit" class="w-full">
                    تأكيد الإزالة
                </x-danger-button>

                <x-secondary-button class="w-full" x-on:click="$dispatch('close')">
                    إلغاء
                </x-secondary-button>

            </div>
        </div>

        <input type="hidden" name="trainee_id" value="{{ $circletraineeJoined->trainee_id }}">

        <input type="hidden" name="circle_id" value="{{ $circletraineeJoined->circle_id }}">

    </form>
</x-modal>