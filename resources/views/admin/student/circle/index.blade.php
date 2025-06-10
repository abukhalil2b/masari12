<x-app-layout>
    <header class="p-3 w-full h-12 bg-white">
        {{ $trainee->name }}
    </header>

    <div class="py-4">
        الحلقات المشترك فيها
    </div>
    
    @foreach($circles as $circle)
    <div class="mt-3 panel">
        <a href="{{ route('admin.circle.show',$circle->id) }}">{{ $circle->title }}</a>
    </div>
    @endforeach

</x-app-layout>