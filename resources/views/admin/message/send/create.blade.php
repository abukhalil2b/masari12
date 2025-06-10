<x-app-layout>


    <div class="p-3">
        <div class="p-1 text-xl text-red-800">
            رسالة جديدة
        </div>

        <form action="{{ route('admin.message.send.store') }}" method="POST">
            @csrf

            <textarea name="content" class="w-full h-32 rounded"></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />

            <div class="mt-4 text-xl text-red-800">
                المستلمين للرسالة
            </div>
            <div class="mt-1 h-52 overflow-scroll border border-red-800 rounded p-1">
                @foreach($contacts as $contact)
                <label class="mt-1 block bg-white p-1">
                    <input type="checkbox" value="{{ $contact->id }}" name="receiver_ids[]">
                    {{ $contact->name }}
                </label>
                @endforeach
            </div>

            <div class="mt-3">
                <x-primary-button>
                    إرسال
                </x-primary-button>
            </div>

        </form>
    </div>

</x-app-layout>