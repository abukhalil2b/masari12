<div class="mt-1 panel flex justify-between">

    <div>
        <div>
            <span class="text-red-800"> طريقة الدفع:</span>
            {{ $payment->payment_method }}
        </div>

        <div>
            <span class="text-red-800">المبلغ المدفوع</span>
            {{ $payment->paid_amount }}
        </div>

        <div>
            <span class="text-red-800">تاريخ الدفع:</span>
            <span class="text-xs">
                {{ $payment->payment_for_month }}
            </span>
        </div>

    </div>

    @if($payment->package)
    @php
    $selectedPackage = json_decode($payment->package);
    @endphp
    <div class="text-xs text-red-800">
        <div>{{ $selectedPackage->title }}</div>
        <div>{{ $selectedPackage->amount }} {{ $selectedPackage->curr }}</div>
    </div>
    @endif

    <div>
        @include('inc.payment._modal_delete_payment')
    </div>

</div>