<x-app-layout>
    <div class="p-3">
        <div class="p-1 text-xl text-red-800">
            الرسائل
        </div>

        @foreach($message_receivers as $message)
        <a href="{{ route('admin.message.show',$message->message_receiver_id) }}">
            <div class="mt-1 card shadow border bg-orange-50 border-orange-300">
                <div class="flex justify-between">
                    <div>
                        <div class="text-base text-blue-600">
                            {{ $message->display_name }}
                        </div>
                        <div class="text-[10px]">{{ Str::substr($message->content,0,40) }}</div>
                    </div>
                    <div class="p-1 text-gray-400 text-[10px]">{{ Str::substr($message->created_at,0,10) }} . {{ Str::substr($message->created_at,10,6) }}</div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</x-app-layout>