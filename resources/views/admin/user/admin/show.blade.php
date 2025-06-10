<x-app-layout>


    <div class="p-3">

        @include('inc._user_show')

        <div class="mt-4 p-2 text-orange-600">
            <a href="{{ route('admin.user.task.index',$user->id) }}">
                المهام
            </a>
        </div>


        <div class="mt-6 flex flex-wrap gap-4">
            @if(auth()->user()->hasPermission('admin.user.admin.password.update'))
            <a href="{{ route('admin.user.admin.password.edit',$user->id) }}" class="btn btn-secondary btn-sm">
                تعديل الرقم السري
            </a>
            @endif

            @if(auth()->user()->hasPermission('admin.user.admin.update'))
            <a href="{{ route('admin.user.admin.edit',$user->id) }}" class="btn btn-secondary btn-sm">
                تعديل
            </a>
            @endif

        </div>
    </div>


</x-app-layout>