<x-app-layout>

    <div class="p-3">


        <div class="card py-6 text-xl border bg-orange-50 border-orange-600 text-orange-600 flex gap-2">
            <img src="{{  $message_receiver->gender == 'male' ? asset('assets/images/avatar/avatar.png') : asset('assets/images/avatar/avatar-female.png')  }}" alt="" class="rounded-full w-8 h-8">
            {{ $message_receiver->display_name }}
        </div>

        <div class="mt-1 h-80 overflow-scroll p-1">
            <div class="p-2 rounded {{ $message_receiver->sender_id == auth()->id() ? ' border border-green-300 bg-green-100 mr-8' : 'ml-8 border bg-orange-50 border-orange-300' }}">
                {!! nl2br($message_receiver->content) !!}

                <div class="border-t mt-4 flex justify-between">
                    <div class="text-xs text-gray-400 italic">
                        {{ $message_receiver->sender_name }}
                    </div>

                    <div class="text-xs text-gray-400">{{ $message_receiver->created_at }}</div>
                </div>
            </div>

            @foreach($replays as $replay)
            <div class="mt-2 p-2 rounded {{ $replay->message_type == 'sent' ? ' border border-green-300 bg-green-100 mr-8' : 'ml-8 border bg-orange-50 border-orange-300' }}">

                {!! nl2br($replay->content) !!}

                <div class="border-t mt-4 flex justify-between">
                    <div class="text-xs text-gray-400 italic">
                        {{ $replay->sender_name }}
                    </div>

                    <div class="text-xs text-gray-400">{{ $replay->created_at }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4 text-blue-800 text-xs">
            كتابة رد
        </div>
        <form action="{{ route('admin.message.replay.store') }}" method="POST">
            @csrf

            <textarea name="content" class="w-full h-32 rounded"></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
            <input type="hidden" value="{{ $message_receiver->message_receiver_id }}" name="message_receiver_id">
            <input type="hidden" value="{{ $message_receiver->message_id }}" name="original_message_id">
            <div class="mt-3">
                <x-primary-button>
                    إرسال الرد
                </x-primary-button>
            </div>

        </form>

    </div>
</x-app-layout>