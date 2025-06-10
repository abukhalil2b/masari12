<x-app-layout>
    <!-- trainee Header -->
    <div class="sticky top-0 z-10 p-4 w-full bg-white border-b border-gray-200 shadow-sm">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold text-gray-800">{{ $trainee->name }}</h1>
            <span class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">
                {{ $circle->title }}
            </span>
        </div>
    </div>

    <!-- Main Form Container -->
    <div class="p-4 max-w-3xl mx-auto">
        <!-- Validation Errors -->
        @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
            <h3 class="font-bold mb-2">يوجد أخطاء في المدخلات</h3>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Study Report Form -->
        <form action="{{ route('admin.trainee.studyreport.store') }}" method="POST" class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            @csrf
            <input type="hidden" name="circle_id" value="{{ $circle->id }}">
            <input type="hidden" name="trainee_id" value="{{ $trainee->id }}">

            <div class="p-4">
                <!-- Completed Tasks Section -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">ما تم إنجازه اليوم</h2>
                    
                    <div class="space-y-3">
                        <label class="flex items-center space-x-3 space-x-reverse p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                            <input type="checkbox" name="tags[]" value="تسميع القرآن الكريم" class="h-5 w-5 text-orange-600 rounded border-gray-300 focus:ring-orange-500">
                            <span class="text-gray-700">تسميع القرآن الكريم</span>
                        </label>
                        
                        <label class="flex items-center space-x-3 space-x-reverse p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                            <input type="checkbox" name="tags[]" value="تسميع الجزرية" class="h-5 w-5 text-orange-600 rounded border-gray-300 focus:ring-orange-500">
                            <span class="text-gray-700">تسميع الجزرية</span>
                        </label>
                        
                        <label class="flex items-center space-x-3 space-x-reverse p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                            <input type="checkbox" name="tags[]" value="مراجعة" class="h-5 w-5 text-orange-600 rounded border-gray-300 focus:ring-orange-500">
                            <span class="text-gray-700">مراجعة</span>
                        </label>
                        
                        <label class="flex items-center space-x-3 space-x-reverse p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                            <input type="checkbox" name="tags[]" value="اختبار" class="h-5 w-5 text-orange-600 rounded border-gray-300 focus:ring-orange-500">
                            <span class="text-gray-700">اختبار</span>
                        </label>
                        
                        <label class="flex items-center space-x-3 space-x-reverse p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                            <input type="checkbox" name="tags[]" value="برنامج التأهيل العلمي" class="h-5 w-5 text-orange-600 rounded border-gray-300 focus:ring-orange-500">
                            <span class="text-gray-700">برنامج التأهيل العلمي</span>
                        </label>
                    </div>
                </div>

                <!-- Notes Section -->
                <div class="mb-8">
                    <label for="note" class="block text-lg font-semibold text-gray-800 mb-3">ملحوظات</label>
                    <textarea name="note" id="note" rows="4" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" placeholder="أي ملاحظات إضافية..."></textarea>
                </div>

                <!-- Circle Duration Section -->
                @include('admin.circle.studyreport._circle_duration')

                <!-- Form Actions -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="flex-1 px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors duration-150">
                        حفظ التقرير
                    </button>
                    
                    <a href="{{ route('admin.circle.studyreport.index',['circle'=>$circle->id,'trainee'=>$trainee->id]) }}" class="flex-1 px-6 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 text-center transition-colors duration-150">
                        عرض كل التقارير
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>