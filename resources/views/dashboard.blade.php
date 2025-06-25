<x-app-layout>

    @if (auth()->user()->profile_using == 'trainee')

        @include('inc._trainee_dashboard')
    @endif

    @if (auth()->user()->profile_using == 'trainer')
        @include('inc._trainer_dashboard')
    @endif

    @if (in_array(auth()->user()->profile_using, ['super_admin', 'admin']))
        @include('inc._admin_dashboard')
    @endif
</x-app-layout>
