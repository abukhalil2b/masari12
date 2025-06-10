<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>مساري - الرئيسية</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&amp;display=swap" rel="stylesheet">
    
    <!-- Assets -->
    @vite(['resources/css/app.css'])
    @vite('resources/js/app.js')
    <link rel="icon" href="/favicon.ico">
</head>

<body class="h-full font-neo">
    <!-- Header -->
    <div class="bg-[#062426] text-white">
        <div class="container mx-auto font-frutiger">
            <nav class="flex items-center justify-between flex-wrap sm:flex-no-wrap py-6 text-white sm:text-right text-center">
                <a class="flex mr-4 sm:mr-0 items-center text-center flex-grow sm:flex-shrink-0 text-white" href="/">
                    <svg overflow="visible" preserveAspectRatio="none" viewBox="0 0 600 300" width="138" height="59.744">
                        <path vector-effect="non-scaling-stroke" fill="#FFFFFF" d="M394.54 191.64c-.78-22.12 10.06-40.47 19.87-59 3-5.77 8.93-6.31 14.46-2.73 5.38 3.49 7.94 8.25 4.51 15a190 190 0 00-8.13 18.7c-2.51 6.66-5.73 13.46-7.1 20.53-1.3 6.72-1.43 14.3 7.08 16.24 7.91 1.81 10.47-5.31 12.26-11 4.86-15.28 7.76-31.19 15.11-45.66 13.1-25.81 37.56-39.11 64.3-34.06 23.32 4.4 39.56 18.08 45.65 41 6.18 23.34-.44 44.07-18.6 60.26-15.24 13.6-36.32 14.7-50.64 3.63s-15.95-24.25-4.62-45.49a50.68 50.68 0 013.84-5.63s-3.17-3.91-4.51-6.1c-2.92-4.71-1.67-9.57 2.42-13.55s8.82-4 13.77-1.6c5.77 2.86 26.43 11.37 27 21.31.5 9.1-9.16 10.64-16.08 11-7.52.41-14 11.09-8.5 19.57 4.9 7.52 12.55 5.43 19.24 1.36 16.12-9.79 20.3-33.81 8.79-49.95-11.14-15.63-35.32-18.2-50.28-5.32-8.76 7.55-13.09 17.7-16.57 28.34-3.95 12.08-7 24.59-12.17 36.11-7.23 16-21.61 22.73-36.63 19.06-13.56-3.3-23.41-16.29-24.44-32.1M350.87 191.92c11.94-16.63 13.19-34.33 20.43-49.5 2.12-4.46 3.58-9.41 6.5-13.26 3.41-4.49 9-4.47 13.76-2.32 5 2.27 7.43 6.37 5.24 12.24-7.54 20.24-13.85 41-22.8 60.6-7.62 16.69-24.61 20-38.7 7.84-2.83-2.44-4.73-9.71-4.73-9.71s-8.27 7.68-11.72 10.28c-12.31 9.3-25.89 14.83-39.59 3.77s-13.12-26.68-6.93-41.14c16.35-38.19 33.73-75.95 50.76-113.86 2.92-6.5 6.83-12.33 15.17-8.32 9.08 4.37 8.68 11.92 5.13 19.84-13.85 30.84-27.8 61.64-41.59 92.51-3.38 7.55-6.58 15.21-9.32 23-1.05 3-1.27 7.19 1.8 9.14s6.44-.36 9.1-2.39c15.56-11.88 24.27-28.55 32.15-45.82 3.45-7.54 7.49-14.56 17.49-8.71 8.08 4.74 6.38 11.65 4 19-3.56 10.81-10.75 21-6.11 36.81M201.84 243.46c-12.91 3.24-28.16 5.36-43.69 1.54-7.89-1.94-15.87-4.48-13.83-14.91 2.12-10.83 10.41-9.07 18.45-7.89 41.67 6.09 73.33-18.28 74.86-57.17.31-7.91-1.56-15.33-3.48-22.82-1.74-6.78-2.9-13.53 5.77-16.47 9-3 12.91 2 16 9.71 16.73 41.73-7.85 92.88-54.07 108M91 211.09a49.75 49.75 0 01-3 6.1s3.68 3.44 5.32 5.42c3.54 4.26 3 9.25-.52 13.76s-8.17 5.23-13.42 3.49c-6.1-2-27.75-7.59-29.66-17.35-1.76-8.95 7.59-11.81 14.39-13.14a10.69 10.69 0 006.81-5.14"></path>
                        <path vector-effect="non-scaling-stroke" fill="#FFFFFF" d="M73 202c.33-.48 20.53-43.27 20.8-43.8a12.85 12.85 0 00-1.12-14c-5.5-7.09-13-4.38-19.29.22-15.26 11.11-17.48 35.39-4.69 50.58 12.37 14.66 44.69 15.59 58.54 1.53a63.42 63.42 0 0016.08-29.76c3-12.36 4.94-25.07 9.19-37 5.9-16.54 19.68-24.41 35-22 13.79 2.19 24.67 14.33 27 30 2.58 22-4.66 35.28-12.93 54.57-2.57 6-8.39 7-14.19 3.9-5.65-3-8.58-7.58-5.72-14.6a189.2 189.2 0 006.58-19.31c2-6.84 2.55-8 3.34-15.15.74-6.8.26-14.36-8.38-15.61-8-1.16-10 6.15-11.33 11.91-3.61 15.63-5.2 31.72-11.34 46.75-11 26.79-44.12 41.87-71.18 39-23.6-2.48-40.9-14.79-48.84-37.17-8.06-22.76-3.15-44 13.63-61.58 14.08-14.79 35-17.6 50.18-7.74 14.83 9.64 17.77 22.44 8.77 43.86-.15.37-19.87 44-20 44.39"></path>
                    </svg>
                </a>
                
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto my-5 sm:my-0">
                    <div class="px-8 sm:px-0 flex-wrap justify-between sm:justify-center flex text-xl flex-grow lg:pl-16">
                        <a class="block sm:inline-block px-2 sm:px-10">عن المنصة</a>
                        <a class="block sm:inline-block px-2 sm:px-10">دليل المتدرب</a>
                        <a class="block sm:inline-block px-2 sm:px-10">المدونة</a>
                        <a class="block sm:inline-block px-2 sm:px-10">اتصل بنا</a>
                    </div>
                    
                    <div class="justify-center flex absolute sm:relative ml-4 mt-4 sm:mt-0 sm:ml-0 left-0 top-0">
                        <a href="/login" class="block border text-black border-white w-full text-center sm:inline-block py-4 text-lg px-10 leading-none rounded bg-white mt-4 lg:mt-0">
                            دخول المنصة
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="text-center HomeHero pb-10 sm:pb-40">
                <h1 class="text-white text-4xl sm:text-6xl font-bold md:pt-48 text-center">مساري حيث لا حدود للتطوير</h1>
                <a class="mt-10 mx-10 text-white font-frutiger bg-caribeanGreen block sm:inline-block border pt-3 pb-4 px-16 text-xl rounded border-caribeanGreen">
                    سجل في المنصة
                </a>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto">
            <h2 class="text-center text-bottleGreen text-4xl font-bold font-frutiger mb-12">الدورات التدريبية</h2>
            
            <div class="flex flex-wrap px-4 sm:px-0 -mx-4">
                <!-- Course 1 -->
                <div class="w-full sm:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <img src="/images/course1.jpg" alt="اسم الدورة" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-tiber mb-2">التنمية البشرية وتطوير الذات</h3>
                            <p class="text-nevada mb-4">المدرب: أحمد محمد</p>
                            <a href="#" class="text-caribeanGreen font-semibold hover:underline">التفاصيل &rarr;</a>
                        </div>
                    </div>
                </div>
                
                <!-- Course 2 -->
                <div class="w-full sm:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <img src="/images/course2.jpg" alt="اسم الدورة" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-tiber mb-2">مهارات القيادة والإدارة</h3>
                            <p class="text-nevada mb-4">المدرب: خميس سالم</p>
                            <a href="#" class="text-caribeanGreen font-semibold hover:underline">التفاصيل &rarr;</a>
                        </div>
                    </div>
                </div>
                
                <!-- Course 3 -->
                <div class="w-full sm:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <img src="/images/course3.png" alt="اسم الدورة" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-tiber mb-2">التسويق الرقمي</h3>
                            <p class="text-nevada mb-4">المدرب: خالد سالم</p>
                            <a href="#" class="text-caribeanGreen font-semibold hover:underline">التفاصيل &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <a href="#" class="inline-block bg-caribeanGreen text-white px-8 py-3 rounded-lg hover:bg-opacity-90 transition-colors duration-300">
                    عرض جميع الدورات
                </a>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-16">
        <div class="container mx-auto">
            <h2 class="text-center text-bottleGreen text-4xl font-bold font-frutiger mb-12">أحدث الأخبار</h2>
            
            <div class="flex flex-wrap px-4 sm:px-0 -mx-4">
                <!-- News 1 -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <img src="/images/news.png" alt="منصة مساري وتحقيق أولوية رؤية عُمان 2040" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-tiber mb-2 truncate">منصة مساري وتحقيق أولوية رؤية عُمان 2040</h3>
                            <p class="text-nevada">1 ديسمبر 2020</p>
                        </div>
                    </div>
                </div>
                
                <!-- News 2 -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <img src="/images/puplish.jpg" alt="تدشين برنامج مساري للتنمية البشرية" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-tiber mb-2 truncate">تدشين برنامج مساري للتنمية البشرية</h3>
                            <p class="text-nevada">1 أغسطس 2020</p>
                        </div>
                    </div>
                </div>
                
                <!-- News 3 (optional) -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <img src="/images/news2.png" alt="خبر جديد" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-tiber mb-2 truncate">ورشة عمل حول التخطيط الاستراتيجي</h3>
                            <p class="text-nevada">15 مارس 2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-gray-200 bg-gray-50">
        <div class="container mx-auto py-12">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-6 md:mb-0">
                    <img src="/images/logo.png" alt="وزارة الأوقاف والشؤون الدينية" class="w-16 h-16 mr-4">
                    <svg overflow="visible" preserveAspectRatio="none" viewBox="0 0 600 300" width="138" height="59.744">
                        <path vector-effect="non-scaling-stroke" fill="#c0c9cf" d="M394.54 191.64c-.78-22.12 10.06-40.47 19.87-59 3-5.77 8.93-6.31 14.46-2.73 5.38 3.49 7.94 8.25 4.51 15a190 190 0 00-8.13 18.7c-2.51 6.66-5.73 13.46-7.1 20.53-1.3 6.72-1.43 14.3 7.08 16.24 7.91 1.81 10.47-5.31 12.26-11 4.86-15.28 7.76-31.19 15.11-45.66 13.1-25.81 37.56-39.11 64.3-34.06 23.32 4.4 39.56 18.08 45.65 41 6.18 23.34-.44 44.07-18.6 60.26-15.24 13.6-36.32 14.7-50.64 3.63s-15.95-24.25-4.62-45.49a50.68 50.68 0 013.84-5.63s-3.17-3.91-4.51-6.1c-2.92-4.71-1.67-9.57 2.42-13.55s8.82-4 13.77-1.6c5.77 2.86 26.43 11.37 27 21.31.5 9.1-9.16 10.64-16.08 11-7.52.41-14 11.09-8.5 19.57 4.9 7.52 12.55 5.43 19.24 1.36 16.12-9.79 20.3-33.81 8.79-49.95-11.14-15.63-35.32-18.2-50.28-5.32-8.76 7.55-13.09 17.7-16.57 28.34-3.95 12.08-7 24.59-12.17 36.11-7.23 16-21.61 22.73-36.63 19.06-13.56-3.3-23.41-16.29-24.44-32.1M350.87 191.92c11.94-16.63 13.19-34.33 20.43-49.5 2.12-4.46 3.58-9.41 6.5-13.26 3.41-4.49 9-4.47 13.76-2.32 5 2.27 7.43 6.37 5.24 12.24-7.54 20.24-13.85 41-22.8 60.6-7.62 16.69-24.61 20-38.7 7.84-2.83-2.44-4.73-9.71-4.73-9.71s-8.27 7.68-11.72 10.28c-12.31 9.3-25.89 14.83-39.59 3.77s-13.12-26.68-6.93-41.14c16.35-38.19 33.73-75.95 50.76-113.86 2.92-6.5 6.83-12.33 15.17-8.32 9.08 4.37 8.68 11.92 5.13 19.84-13.85 30.84-27.8 61.64-41.59 92.51-3.38 7.55-6.58 15.21-9.32 23-1.05 3-1.27 7.19 1.8 9.14s6.44-.36 9.1-2.39c15.56-11.88 24.27-28.55 32.15-45.82 3.45-7.54 7.49-14.56 17.49-8.71 8.08 4.74 6.38 11.65 4 19-3.56 10.81-10.75 21-6.11 36.81M201.84 243.46c-12.91 3.24-28.16 5.36-43.69 1.54-7.89-1.94-15.87-4.48-13.83-14.91 2.12-10.83 10.41-9.07 18.45-7.89 41.67 6.09 73.33-18.28 74.86-57.17.31-7.91-1.56-15.33-3.48-22.82-1.74-6.78-2.9-13.53 5.77-16.47 9-3 12.91 2 16 9.71 16.73 41.73-7.85 92.88-54.07 108M91 211.09a49.75 49.75 0 01-3 6.1s3.68 3.44 5.32 5.42c3.54 4.26 3 9.25-.52 13.76s-8.17 5.23-13.42 3.49c-6.1-2-27.75-7.59-29.66-17.35-1.76-8.95 7.59-11.81 14.39-13.14a10.69 10.69 0 006.81-5.14"></path>
                        <path vector-effect="non-scaling-stroke" fill="#c0c9cf" d="M73 202c.33-.48 20.53-43.27 20.8-43.8a12.85 12.85 0 00-1.12-14c-5.5-7.09-13-4.38-19.29.22-15.26 11.11-17.48 35.39-4.69 50.58 12.37 14.66 44.69 15.59 58.54 1.53a63.42 63.42 0 0016.08-29.76c3-12.36 4.94-25.07 9.19-37 5.9-16.54 19.68-24.41 35-22 13.79 2.19 24.67 14.33 27 30 2.58 22-4.66 35.28-12.93 54.57-2.57 6-8.39 7-14.19 3.9-5.65-3-8.58-7.58-5.72-14.6a189.2 189.2 0 006.58-19.31c2-6.84 2.55-8 3.34-15.15.74-6.8.26-14.36-8.38-15.61-8-1.16-10 6.15-11.33 11.91-3.61 15.63-5.2 31.72-11.34 46.75-11 26.79-44.12 41.87-71.18 39-23.6-2.48-40.9-14.79-48.84-37.17-8.06-22.76-3.15-44 13.63-61.58 14.08-14.79 35-17.6 50.18-7.74 14.83 9.64 17.77 22.44 8.77 43.86-.15.37-19.87 44-20 44.39"></path>
                    </svg>
                </div>
                
                <div class="flex flex-wrap justify-center md:justify-end gap-6">
                    <a href="#" class="text-nevada hover:text-caribeanGreen transition-colors duration-300">سياسة الخصوصية</a>
                    <a href="#" class="text-nevada hover:text-caribeanGreen transition-colors duration-300">الشروط والأحكام</a>
                    <a href="#" class="text-nevada hover:text-caribeanGreen transition-colors duration-300">الدورات</a>
                    <a href="#" class="text-nevada hover:text-caribeanGreen transition-colors duration-300">كن مدرب معنا</a>
                    <a href="#" class="text-nevada hover:text-caribeanGreen transition-colors duration-300">اتصل بنا</a>
                </div>
            </div>
            
            <div class="border-t border-gray-200 mt-8 pt-8 text-center">
                <p class="text-nevada">جميع الحقوق محفوظة لوزارة الأوقاف والشؤون الدينية &copy; <span id="year"></span></p>
            </div>
        </div>
    </footer>

    <script>
        // Add current year to footer
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>