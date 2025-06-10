<x-app-layout>
    <header class="p-3 w-full h-12 bg-white">
        {{ $trainee->name }}
    </header>

    <div class="p-3">
        @foreach($traineePayments as $traineePayment)
        <div class="panel mt-2">

            <div>
                <span class="text-red-800">المبلغ المدفوع</span>
                {{ $traineePayment->paid_amount }}
            </div>
            <div>
                <span class="text-red-800">طريقة الدفع</span>
                {{ $traineePayment->payment_method }}
            </div>

            <div>
                <span class="text-red-800">الحلقة</span>
                {{ $traineePayment->title }}
            </div>

        </div>
        @endforeach

    </div>
</x-app-layout>