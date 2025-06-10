<div>
    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-trainee')" class="text-xs">
        + متدرب جديد
    </x-primary-button>

    <x-modal name="create-trainee" :show="$errors->isNotEmpty()" focusable>

        <form action="{{ route('admin.user.trainee.store') }}" method="POST" class="p-1">
            @csrf

            <div class="p-3" >

                <div x-data="{ gender:'male' }" class="flex gap-2">
                    <div class="option size-16" :class=" gender == 'male' ? 'option-selected' : '' " @click="gender='male' "> {{ __('male') }} </div>
                    <div class="option size-16" :class=" gender == 'female' ? 'option-selected' : '' " @click="gender='female' "> {{ __('female') }}</div>
                    <input type="hidden" name="gender" x-model="gender">
                </div>

                <div class="py-1 mt-2">
                    الرقم المدني <span class="text-danger">(حقل ضروري)</span>
                </div>
                <input class="form-input" name="civil_id">

                <div class="py-1 mt-2">
                    الاسم الكامل <span class="text-danger">(حقل ضروري)</span>
                </div>
                <input class="form-input" name="name">

                <div class="py-1 mt-2">
                    رقم الهاتف <span class="text-danger">(حقل ضروري)</span>
                </div>
                <input class="form-input" name="phone">

                <div class="py-1 mt-2">
                      الاسم الأول
                </div>
                <input class="form-input" name="first_name">

                <div class="py-1 mt-2">
                    القبيلة  
                </div>
                <input class="form-input" name="last_name">

                <div class="py-1 mt-2">
                    تاريخ الميلاد  
                </div>
                <input class="form-input" name="date_of_birth" type="date">

                <button class="mt-4 btn btn-primary">
                    حفظ
                </button>

            </div>

        </form>

    </x-modal>
</div>