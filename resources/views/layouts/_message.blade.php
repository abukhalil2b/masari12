@if(session('message'))
<div class="my-2 py-4 {{ session('status') == 'success' ? 'text-success' : 'text-danger' }} text-center">
    {{ session('message') }}
</div>
@endif