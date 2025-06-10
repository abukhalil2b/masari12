<x-app-layout>


    <div class="p-3">

        @include('inc._user_show')

        <div class="mt-4 p-2 text-orange-600">
            <a href="{{ route('admin.user.task.index',$user->id) }}">
                المهام
            </a>
        </div>

        <div class="mt-6 flex flex-wrap gap-4">
            @if(auth()->user()->hasPermission('admin.user.trainer.password.update'))
            <a href="{{ route('admin.user.trainer.password.edit',$user->id) }}" class="btn btn-secondary btn-sm">
                تعديل الرقم السري
            </a>
            @endif

            @if(auth()->user()->hasPermission('admin.user.trainer.update'))
            <a href="{{ route('admin.user.trainer.edit',$user->id) }}" class="btn btn-secondary btn-sm">
                تعديل
            </a>
            @endif

            @if(auth()->user()->hasPermission('admin.impersonate'))
            @include('admin.user._impersonate_button')
            @endif

        </div>

    </div>


</x-app-layout>