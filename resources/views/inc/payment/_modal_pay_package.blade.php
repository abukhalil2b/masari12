<div>

    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'pay-package')" class="text-xs">
        الباقات المتوفرة
    </x-primary-button>

    <x-modal name="pay-package" :show="$errors->isNotEmpty()" focusable>

        <form action="{{ route('trainee.circle_trainee.package.store') }}" method="POST" class="p-1" enctype="multipart/form-data">
            @csrf

            <div class="p-3">

                <div class="mt-2">
                    طريقة الدفع
                    <div> (التحويل)</div>
                </div>

                <div class="mt-2">
                    إختر من الباقات

                    <div class="mt-3 p-3 flex flex-wrap gap-2" x-data="{ package:null }">
                        @foreach(json_decode($circle->packages) as $package)
                        <div class="card border rounded p-5  cursor-pointer " :class="package == '{{ json_encode($package) }}' ? 'bg-green-100' : 'hover:bg-slate-50' " @click="package = '{{ json_encode($package) }}' ">
                            <div>{{ $package->title }}</div>
                            <div>{{ $package->amount }}</div>
                        </div>
                        @endforeach
                        <input type="hidden" x-model="package" name="package" >
                    </div>
                </div>

                <div class="mt-2">
                    إيصال الدفع

                    <x-text-input id="slip" name="slip" type="file" class="mt-1 w-full" />

                </div>

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