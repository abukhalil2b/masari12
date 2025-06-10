<div>
    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-venue')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd" />
        </svg>
        مكان جديد
    </x-primary-button>

    <x-modal name="create-venue" :show="$errors->venue->isNotEmpty()" focusable maxWidth="md">
        <form method="post" action="{{ route('admin.venue.store') }}" class="p-6 space-y-6">
            @csrf

            <div class="flex items-center justify-between border-b pb-4">
                <h3 class="text-xl font-semibold text-gray-900">
                    إضافة مكان جديد
                </h3>
                <button type="button" x-on:click="$dispatch('close')" class="text-gray-400 hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="space-y-4">
                <div>
                  
                    <label for="title" class="flex items-center text-xs">
                        <span>اسم المكان</span>
                        <span class="text-red-500 mr-1">*</span>
                    </label>
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                        :value="old('title')" required autofocus placeholder="أدخل اسم المكان" />

                    <x-input-error :messages="$errors->venue->get('title')" class="mt-2" />
                </div>

                <div>
                  
                    <label for="place_link" class="flex items-center text-xs">
                        <span>رابط الموقع</span>
                        <span class="text-red-500 mr-1">*</span>
                    </label>

                    <x-text-input id="place_link" name="place_link" type="url" class="mt-1 block w-full"
                        :value="old('place_link')" required placeholder="https://maps.google.com/..." />

                    <x-input-error :messages="$errors->venue->get('place_link')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd" />
                </svg>
               <span class="text-red-500 mr-1"> الحقول المميزة بـ * إلزامية</span>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <x-secondary-button type="button" x-on:click="$dispatch('close')"
                    class="px-4 py-2 border border-gray-300 hover:bg-gray-50">
                    إلغاء
                </x-secondary-button>

                <x-primary-button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    حفظ المكان
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</div>
