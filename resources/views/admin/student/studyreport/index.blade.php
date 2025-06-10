<x-app-layout>
    <header class="p-3 w-full h-12 bg-white">
        {{ $trainee->name }}
    </header>

    <div class="p-3">

        @foreach($reports as $report)
        
        @include('inc._report-card')
        
        @endforeach

    </div>
</x-app-layout>