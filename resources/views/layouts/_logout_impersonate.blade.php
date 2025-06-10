@auth
@if(auth()->user()->isImpersonating())
<div class="p-1 text-center bg-red-100">
    <a href="{{ route('admin.impersonate.disable') }}">
       تسجيل الخروج من حساب <span class="text-orange-500 ">{{ auth()->user()->name }}</span>
    </a>
</div>
@endif
@endauth