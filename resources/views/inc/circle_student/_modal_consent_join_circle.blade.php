<div x-data="" x-on:click.prevent="$dispatch('open-modal', 'consent_join_circle{{ $trainee->trainee_id }}')" class="cursor-pointer mt-2 border border-blue-800 text-center rounded p-1 w-32  text-[10px] text-blue-800">
    الموافقة على إنضمام المتدرب
</div>

<x-modal name="consent_join_circle{{ $trainee->trainee_id }}" :show="$errors->isNotEmpty()" focusable>

    <div class="p-5">

        <div>
            بعد الموافقة لايمكن التراجع
        </div>

        <div class="mt-5 flex gap-3">

            <a href="{{ route('admin.circle_trainee.consent_standby',['trainee_id'=>$trainee->trainee_id,'circle_id'=>$trainee->circle_id]) }}" class="w-full flex items-center  justify-center h-10 px-3 bg-red-100 border rounded text-xs border-red-800 text-red-800 hover:bg-red-50 focus:outline-none transition ease-in-out duration-150">
                تأكيد الموافقة
            </a>
            <x-secondary-button class="w-full" x-on:click="$dispatch('close')">
                إلغاء
            </x-secondary-button>

        </div>
    </div>

</x-modal>