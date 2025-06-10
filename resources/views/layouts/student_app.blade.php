<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
       مساري للتنمية البشرية
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 text-green-900">

    <!-- impersonate -->
    @include('layouts._logout_impersonate')


 
    <div class="mt-2 py-1 flex gap-1 justify-center">

        <div class="w-80">
            <div class="w-80 p-1 bg-white rounded flex items-center justify-between gap-1">
                <div class="flex items-center gap-1">
                    <img class="w-12 h-12 rounded" src="/assets/images/avatar/avatar.png" alt="avatar">
                    <div>
                        <div class="text-sm"> {{ auth()->user()->name }}</div>
                        <div class="text-xs text-gray-400"> {{ auth()->user()->civil_id }}</div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-xs text-red-400">تسجيل الخروج</button>
                </form>
            </div>

            <div class="w-80 mt-4 flex gap-2 justify-center">
                <a href="{{ route('profile.edit') }}" class="text-green-800 border border-green-800 rounded p-1 flex justify-center items-center bg-green-50 hover:bg-green-100 w-28 text-xs">
                    الملف الشخصي
                </a>
                <a href="{{ url('/') }}" class="text-green-800 border border-green-800 rounded p-1 flex justify-center items-center bg-green-50 hover:bg-green-100 w-28 text-xs">
                    الدورات المتوفرة
                </a>
                <a href="/my_courses" class="text-green-800 border border-green-800 rounded p-1 flex justify-center items-center bg-green-50 hover:bg-green-100 w-28 text-xs">
                    دوراتي
                </a>
            </div>
            <div class="mt-4 flex gap-2 justify-center">
                <a href="/message" class="text-green-800 border border-green-800 rounded p-1 flex justify-center items-center bg-green-50 hover:bg-green-100 w-28 text-xs">
                    التواصل
                </a>

            </div>

        
        </div>
    </div>


    {{ $slot }}

    <div class=" mt-16"></div>
    <footer class="w-full h-16 bg-gray-800 text-white fixed bottom-0">

    </footer>
</body>

</html>