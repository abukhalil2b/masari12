@if (session('message'))
    @php
        $status = session('status', 'success');
        $isSuccess = $status === 'success';
    @endphp

    <div class="my-4 px-4 py-3 rounded text-center 
        {{ $isSuccess ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
        {{ session('message') }}
    </div>
@endif
