<x-app-layout>
    <div class="min-h-screen bg-[#f7f7f7] pb-32">
        <div class="container mx-auto">
            <div class="mt-8">
                <h2 class="py-4 text-2xl text-tiber mt-12">الدورات المتوفرة</h2>

                <a href="{{ route('course.index') }}" class="btn btn-primary">
                    كل الدورات
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('course.index', $category->id) }}" class="btn btn-primary">
                        {{ $category->title }}
                    </a>
                @endforeach
                @foreach ($courses as $course)
                    <div
                        class="mb-4 relative flex-wrap  hover:shadow flex bg-white rounded-lg border border-alto overflow-hidden">
                        <div class="flex w-full sm:w-1/3 relative"><img src="/images/course_cover.jpg"
                                alt="المهارات الأساسية للتعامل مع برنامج  إكسل Excel" class="w-full h-56">
                            <div class="absolute bg-white text-tiber bottom-0 right-0 -mr-1 -mb-1 hidden"></div>
                        </div>
                        <div class="py-8 pl-4 pr-12 flex flex-wrap items-stretch w-full sm:w-2/3">
                            <h1 class="w-full  text-tiber text-3xl">
                                <a href="">
                                    {{ $course->title }}
                                </a>
                            </h1>
                            <div
                                class="text-lg flex w-full pt-2 pb-4 flex-grow text-nevada text-helvetica font-hairline antialiased">
                                {{ $course->courseCategory->title }}
                                <span class="border-r border-gray-400 mx-4 false"></span> 14 درسًا<span
                                    class="border-r border-gray-400 mx-4"></span> سامي سعيد سليمان الجهضمي
                            </div>
                            <div class="w-full flex"><span
                                    class=" text-xl text-tiber font-hairline border-b border-gray-400 antialiased pb-1">
                                    @if ($course->registration_type == 'open')
                                        مفتوحة دائما
                                    @else
                                        محدده بوقت
                                    @endif
                                </span></div>
                            <div class="absolute left-0 bottom-0 mb-5 ml-5 text-center">
                                @php
                                    $userProgress = 91;
                                @endphp
                                <x-svgicon.round-progress :percentage="$userProgress" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
