<x-app-layout>

    <div class="my-4 panel">

        <div class="text-xl text-blue-600"> {{ $user->name }}</div>

        <div class="text-xl text-orange-600"> تأكيد إزالة حساب ({{ __($profile->title) }})</div>

        <div class="text-info">
            الحساب هو عبارة عن (صلاحية الوصول) لذا عند إزالة الحساب لن يتم حذف بيانات أخرى مرتبطة بالمستخدم. ويمكن إرجاع الحساب مرة أخرى
        </div>
        <div class="text-orange-600">
            يجب أن يكون للمستخدم على الأقل حساب واحد، لذا لايمكن حذف آخر حساب لدى المستخدم
        </div>
        <div class="text-orange-600">
            في حالة ضرورة حذف حساب معين 
            <span class="text-green-600">(مثلا حساب متدرب)</span>
             وهو آخر حساب للمستخدم، فيجب إعطاء المستخدم حساب إضافي 
            <span class="text-blue-600">(مثلا حساب مدرب)</span>
             قبل حذف الحساب الآخر 
            <span class="text-green-600">(حساب المتدرب)</span>
        </div>
    </div>

    <a href="{{ route('admin.profile.remove_account',['user'=>$user->id,'profile'=>$profile->id]) }}" class="btn btn-outline-danger">
        تأكيد إزالة الحساب
    </a>

</x-app-layout>