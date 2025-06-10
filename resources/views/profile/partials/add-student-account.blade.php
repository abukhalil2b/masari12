
<section>
    <div>
        إضافة حساب متدرب
    </div>

    <form method="post" action="{{ route('admin.profile.add_trainee_account') }}" class="mt-6 space-y-6">
        @csrf
        <div class="flex items-center gap-4">
            <x-primary-button>
            إضافة حساب متدرب
            </x-primary-button>
        </div>
    </form>
</section>