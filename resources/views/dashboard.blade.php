<x-app-layout>
    @if (auth()->user()->profile_using == 'trainee')
        @include('inc._trainee_dashboard')
    @endif

    @if (in_array(auth()->user()->profile_using, ['admin', 'trainer']))
        @include('inc._trainee_dashboard')
    @endif
</x-app-layout>
