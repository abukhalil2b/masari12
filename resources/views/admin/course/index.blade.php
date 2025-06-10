<x-app-layout>

    <div class="p-3 w-full h-16 text-green-700 bg-green-50 border border-green-700 text-xl flex justify-between">
        <div>
            <div class="text-xs">البرنامج:</div>
            {{ $program->title }}
        </div>

        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-course')" class="h-10 text-xs">
            + دورة
        </x-primary-button>
    </div>

    <!-- new course -->

    <div class="p-3 flex flex-wrap gap-3">
        <a href="{{ route('admin.program.trainer.index',$program->id) }}" class="w-16 block text-red-900">
            المدربين
        </a>

        <a href="{{ route('admin.program.trainee.index',$program->id) }}" class="w-16 block text-red-900">
            المتدربين
        </a>

    </div>


    <!-- new course -->
    @include('inc._modal-add-new-course')


    @foreach($courses as $course)

    <table class=" border border-black ">
        <thead>
            <tr class=" border border-black !bg-orange-50 !text-orange-700 !p-3 !shadow {{ $course->status == 'disable' ? '!opacity-30' : '' }}">

                <td colspan="2">
                    <div class="text-xs">دورة:</div>
                    <div class="text-xl p-1">
                        {{ $course->title }}
                    </div>

                    @include('inc._modal-edit-course')
                    <div class="mt-3 flex gap-3 text-xs cursor-pointer p-1">
                        <div x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-course{{ $course->id }}')">تعديل</div>
                        <a href="{{ route('admin.course.delete_form',$course->id) }}" class="text-red-400">
                            حذف
                        </a>
                    </div>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr class="border border-black">
                <td class="w-20">
                    <div class="text-red-800 p-1">الوصف:</div>
                </td>
                <td>
                    <div class="text-gray-500"> {!! $course->description !!}</div>
                </td>
            </tr>

            <tr class="border border-black">
                <td class="w-20">
                    <div class="text-red-800 p-1">الأهداف:</div>
                </td>
                <td>
                    <div class="text-gray-500"> {!! nl2br($course->aims) !!}</div>
                </td>
            </tr>

            <tr class="border border-black">
                <td colspan="2">

                    <div class="text-red-800 p-1 rounded" x-data="{ show:false }">
                        <div class="flex justify-between">
                            <div @click=" show = ! show " class="cursor-pointer" :class=" show == true ? 'text-red-800 text-lg' : ''">
                                الحلقات {{ $course->activeCircles->count() }}
                            </div>

                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                <button type="button" class="hover:text-primary" @click="toggle">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-100">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    </svg>
                                </button>
                                <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="w-52 ltr:right-0 rtl:left-0">
                                    <li>
                                        <a href="{{ route('admin.circle.create_learn_as_group',['course'=>$course->id]) }}" class="text-xs">
                                            + حلقة (تعليم جماعي)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.circle.create_learn_as_individual_with_amount_payment',['course'=>$course->id]) }}" class="text-xs">
                                            + حلقة (تعليم فردي بتحديد المبلغ)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.circle.create_learn_as_individual_with_package_payment',['course'=>$course->id]) }}" class="text-xs">
                                            + حلقة (تعليم فردي بالباقات)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.circle.create_free',['course'=>$course->id]) }}" class="text-xs">
                                            + حلقة (مجاني)
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div x-cloak x-show="show">
                            @foreach($course->activeCircles as $circle)
                            <a href="{{ route('admin.circle.show',$circle->id) }}" class="p-1 block font-bold mt-1 w-full border rounded {{ $circle->status == 'close' ? 'bg-gray-100 border-gray-200 text-gray-300' : 'border-red-800  bg-red-50' }}">
                                {{ $circle->title }}
                            </a>
                            @endforeach
                            <a class="block mt-4" href="{{ route('admin.course.show',$course->id) }}">تعديل ترتيب الحلقات</a>
                        </div>
                    </div>

                </td>
            </tr>
    </table>

    @endforeach


</x-app-layout>