<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>مساري للتنمية البشرية</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tajawal or other Arabic font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <!-- Material Icons (for <i class="material-icons">) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="h-full bg-white overflow-x-hidden">
    <!-- impersonate -->
    @include('layouts._logout_impersonate')

    <div class="min-h-screen bg-[#082623]">
        <div class="max-w-screen-xl mx-auto px-4">
            <nav
                class="flex flex-col sm:flex-row sm:items-center sm:justify-between py-4 text-white text-center sm:text-right gap-4">
                <!-- Logo -->
                <div class="flex justify-center sm:justify-start">
                    <a href="#">
                        <x-svgicon.logo />
                    </a>
                </div>

                <!-- Nav Links -->
                <div class="w-full sm:w-auto flex flex-wrap justify-center gap-6 text-[#00bab1] text-sm sm:text-base">
                    <a class="flex flex-col items-center hover:text-white" href="#">
                        <i class="material-icons text-[40px] sm:text-[48px] mb-1 leading-none">view_list</i>
                        <span>دوراتي</span>
                    </a>
                    <a class="flex flex-col items-center hover:text-white" href="#">
                        <i class="material-icons text-[40px] sm:text-[48px] mb-1 leading-none">play_circle_filled</i>
                        <span>الدورات</span>
                    </a>
                    <a class="group flex flex-col items-center hover:text-white" href="#">
                        <span
                            class="bg-[#00bab1] text-[#082623] w-6 h-6 rounded-full text-xs text-center leading-7 mb-1">
                            3
                        </span>
                        <span>المتجر</span>
                    </a>
                    <a class="flex flex-col items-center hover:text-white" href="#">
                        <i class="material-icons text-[40px] sm:text-[48px] mb-1 leading-none">insert_comment</i>
                        <span>المجتمع</span>
                    </a>
                </div>


                <!-- Profile section with dropdown -->
                <div x-data="{ open: false }" class="relative flex items-center justify-center sm:justify-end">
                    <a class="flex items-center hover:text-white" href="/profile">
                        <img src="/images/student_m.png" alt="صورة الطالب"
                            class="w-16 h-16 rounded-full bg-[#00bab1] object-cover">
                        <div class="mr-4 text-right hidden sm:block">
                            <h1 class="truncate sm:w-40 text-lg">متدرب تجريبي</h1>
                            <span class="text-base">زاويتي التعليمية</span>
                        </div>
                    </a>
                    <button @click="open = !open" type="button"
                        class="mr-3 w-8 h-8 rounded-full bg-[#00bab1] text-white focus:outline-none">
                        <i class="material-icons text-3xl">keyboard_arrow_down</i>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute top-0 right-0 mt-20 w-64 shadow-lg bg-white rounded p-2 z-50">
                        <a class="block px-4 py-3 text-base text-[#082623] hover:bg-gray-200" href="/profile">تعديل
                            البيانات الشخصية</a>
                        @if (Auth::user()->profile_using != 'super_admin')
                            @foreach (Auth::user()->profiles as $profile)
                                    <a href="{{ route('switch-account', $profile->id) }}"
                                        class="block px-4 py-3 text-base bg-[#fffbf6] text-[#bd6e1e] {{ Auth::user()->profile_using == $profile->title ? 'opacity-30' : '' }}">
                                        الدخول كـ{{ __($profile->title) }}
                                    </a>
                            @endforeach
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-right px-4 py-3 text-base text-[#082623] hover:bg-gray-200">
                                تسجيل الخروج
                            </button>
                        </form>>
                    </div>
                </div>
            </nav>
        </div>
        {{ $slot }}
    </div>

</body>

</html>
