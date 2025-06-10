@if(session('message'))
<div class="my-2 py-4 {{ session('status') == 'success' ? 'text-success bg-green-50' : 'text-danger bg-red-50' }} text-center">
    {{ session('message') }}
</div>
@endif