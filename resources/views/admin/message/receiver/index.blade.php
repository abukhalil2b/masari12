<x-app-layout>


    <div class="p-3">
        <div class="p-1 text-xl text-red-800">
            المستلمين
        </div>

        <div class="mt-4">

            @foreach($receivers as $receiver)
            <div class="mt-1 rounded p-1 border bg-white">

                <div class="text-[10px]">الاسم: {{ $receiver->name }}</div>
                <div class="text-[10px]"> الجنس: {{ __($receiver->gender) }}</div>
                <div class="text-[10px]"> الرقم المدني: {{ $receiver->civil_id }}</div>

            </div>
            @endforeach

        </div>
    </div>

</x-app-layout>