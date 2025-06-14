    <div class="min-h-screen bg-[#f7f7f7] pb-32">
        <div class="border-b border-borderGray shadow-md">
            <div class="container">
                <div class="flex py-5 flex-wrap">
                    <div class="px-2 sm:px-0 text-right flex flex-grow items-center justify-between">
                        <div class="relative overflow-hidden flex-shrink-0 rounded-full TrainerInfoJob"><img
                                src="https://masari.mara.gov.om/api/uploads/student_m.png" alt="متدرب تجريبي"
                                class="w-16 h-16 sm:w-20 bg-gray-400 overflow-hidden sm:h-20 rounded-full"><button
                                type="button"
                                class="TrainerInfoJob__edit absolute top-0 right-0 w-full h-full bg-tiber opacity-75"><i
                                    class="material-icons align-middle inline-block text-3xl text-white pointer-events-none">edit</i></button>
                        </div>
                        <div class="mr-8 flex-grow text-tiber justify-right">
                            <h1 class="sm:text-2xl text-furtigerb font-bold">متدرب تجريبي</h1>
                            <p class="text-nevada">حساب متدرب تجريبي</p>
                        </div>
                        <div>
                            
                        </div>
                        <div class="flex flex-col bg-teal-200 py-2 px-3 text-center rounded">
                            <span>ترتيبك</span><b>696</b>
                             
                        </div>
                      
                    </div><a class="w-1/3 flex items-center mt-4 sm:mt-0" href="/student/badges"></a>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <h2 class=" text-2xl text-tiber mt-12">دورات أدرسها</h2>
            <div class="mt-8">
                <div
                    class="mb-4 relative flex-wrap  hover:shadow flex bg-white rounded-lg border border-alto overflow-hidden">
                    <div class="flex w-full sm:w-1/3 relative"><img src="/images/course_cover.jpg"
                            alt="المهارات الأساسية للتعامل مع برنامج  إكسل Excel" class="w-full h-56">
                        <div class="absolute bg-white text-tiber bottom-0 right-0 -mr-1 -mb-1 hidden"></div>
                    </div>
                    <div class="py-8 pl-4 pr-12 flex flex-wrap items-stretch w-full sm:w-2/3">
                        <h1 class="w-full  text-tiber text-3xl"><a href="/student/course/183">المهارات
                                الأساسية للتعامل مع برنامج إكسل Excel</a></h1>
                        <div
                            class="text-lg flex w-full pt-2 pb-4 flex-grow text-nevada text-helvetica font-hairline antialiased">
                            تقنية المعلومات<span class="border-r border-gray-400 mx-4 false"></span> 14 درسًا<span
                                class="border-r border-gray-400 mx-4"></span> سامي سعيد سليمان الجهضمي</div>
                        <div class="w-full flex"><span
                                class=" text-xl text-tiber font-hairline border-b border-gray-400 antialiased pb-1">مفتوحة
                                دائما</span></div>
                        <div class="absolute left-0 bottom-0 mb-5 ml-5 text-center">
                            @php
                                $userProgress = 91;
                            @endphp
                            <x-svgicon.roundprogress :percentage="$userProgress" />
                        </div>
@php
                                $brainProgress = 91;
                            @endphp
                            <x-svgicon.brain-progress :percentage="$brainProgress" />
                    </div>
                </div>
            </div>
        </div>
    </div>
