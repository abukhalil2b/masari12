<x-app-layout>

    <div class="my-4 panel">

        <div class="text-xl text-blue-600"> {{ $user->name }}</div>

        <div class="text-xl text-orange-600"> تأكيد إضافة حساب ({{ __($profile->title) }})</div>

        <div class="text-info">
            الحساب هو عبارة عن (صلاحية الوصول) لذا عند إضافة الحساب سيأخذ هذا المستخدم الصلاحيات المرتبطة بهذا الحساب الجديد
        </div>

    </div>

    <a href="{{ route('admin.profile.add_account',['user'=>$user->id,'title'=>$profile->title]) }}" class="btn btn-outline-danger">
        تأكيد إضافة الحساب
    </a>

</x-app-layout>