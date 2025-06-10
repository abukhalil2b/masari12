<x-app-layout>

    <header class="p-3 w-full h-12 bg-white">
        {{ $profile->title }}
    </header>

    <div>
        <form action="{{ route('admin.profile_permission.update',$profile->id) }}" method="POST">
            @csrf

            @foreach($permissions as $permission)

            @php
            $bgColor = '';
            if($permission->permissionCate == 'circle'){
            $bgColor = 'bg-green-200';
            }
            if($permission->permissionCate == 'course'){
            $bgColor = 'bg-purple-200';
            }

            if($permission->permissionCate == 'profile'){
            $bgColor = 'bg-red-200';
            }
            if($permission->permissionCate == 'program'){
            $bgColor = 'bg-orange-200';
            }

            if($permission->permissionCate == 'report'){
            $bgColor = 'bg-pink-50';
            }
            if($permission->permissionCate == 'trainee'){
            $bgColor = 'bg-blue-50';
            }

            if($permission->permissionCate == 'trainer'){
            $bgColor = 'bg-yellow-200';
            }

            @endphp
            <label class="border p-1 rounded cursor-pointer flex gap-1 items-center {{ $bgColor }}">
                <input name="permissionIds[]" type="checkbox" value="{{ $permission->permissionId }}" @if($permission->selected) checked @endif class="input_checkbox">
                <div class="text-xs">
                    {{ $permission->permissionSlug }}
                </div>
            </label>

            @endforeach

            @if(count($permissions))
            <button class="mt-5 btn btn-outline-secondary">update</button>
            @endif
        </form>

    </div>

</x-app-layout>