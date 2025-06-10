<div>

    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'payment')" class="text-xs">
        + عملية دفع
    </x-primary-button>


    <x-modal name="payment" :show="$errors->isNotEmpty()" focusable>

        <form action="{{ route('trainee.circle_trainee.payment.store') }}" method="POST" class="p-1" enctype="multipart/form-data">
            @csrf

            <div class="p-3">

                <div class="mt-2">
                    طريقة الدفع
                    <div> (التحويل)</div>
                </div>


                <div class="mt-2">
                    المبلع المدفوع
                    <x-text-input id="paid_amount" name="paid_amount" type="number" class="mt-1 w-full" step="any" placeholder="1.000" />
                </div>

                <div class="mt-2">
                    إيصال الدفع
                    <x-text-input id="slip" name="slip" type="file" class="mt-1 w-full" />
                </div>


                @if($traineeCircle->price_for_one_time)

                <div class="mt-3">
                    عن شهر
                    <x-text-input id="payment_for_month" name="payment_for_month" type="date" class="mt-1 w-full" />
                </div>

                @endif

                <input type="hidden" name="circle_trainee_id" value="{{ $traineeCircle->id }}">

                <div class="mt-3 flex gap-3">

                    <x-primary-button class="w-full" type="submit">
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