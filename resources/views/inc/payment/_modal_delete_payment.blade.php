<div>

    <div x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-payment{{ $payment->id }}')" class="cursor-pointer text-xs text-red-800">حذف</div>

    <x-modal name="delete-payment{{ $payment->id }}" :show="$errors->isNotEmpty()" focusable>

        <form action="{{ route('trainee.circle_trainee.payment.delete',$payment->id) }}" method="POST" class="p-1">
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