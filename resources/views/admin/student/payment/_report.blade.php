<div class="py-6">
    التقرير
    @foreach($studyreports as $studyreport)
    <div class="text-xs mt-1 bg-white">

        <div class="text-gray-400 ">{{ $studyreport->created_at }}</div>

        <div class="py-1 flex gap-2 text-xs">
            <div>
                <span class="text-red-800">الوقت من: </span>
                {{ $studyreport->time_start_at }}
            </div>
            <div>
                <span class="text-red-800"> إلى </span>
                {{ $studyreport->time_end_at }}
            </div>

            <div>
                <span class="text-red-800">الدقائق المستهلكة</span>
                {{ $studyreport->time_consumed_in_minut }}
            </div>
        </div>
    </div>
    @endforeach
</div>