@php
    $userPermissions = auth()->user()->getPermissions();
@endphp
<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white dark:bg-[#0e1726] h-full">
            <div class="flex justify-between items-center px-4 py-3">
                <a href="{{ route('dashboard') }}" class="main-logo flex items-center shrink-0">
                    <img class="w-8 flex-none" src="/assets/images/logo.png" alt="image" />
                </a>
                <span class="text-[10px]">
                    مساري للتنمية البشرية
                </span>
                <a href="javascript:;"
                    class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light transition duration-300 rtl:rotate-180"
                    @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul>
                <!-- المستخدمين -->
            <x-nav-header title='المستخدمين' />

                <li class="nav-item">
                    <ul>
                        @if (in_array('admin.user.admin.index', $userPermissions) || auth()->id() == 1)
                            <li class="menu nav-item">
                                <a href="{{ route('admin.user.admin.index') }}" class="nav-link group">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="15" cy="6" r="3"
                                                fill="currentColor"></circle>
                                            <ellipse opacity="0.5" cx="16" cy="17" rx="5"
                                                ry="3" fill="currentColor"></ellipse>
                                            <circle cx="9.00098" cy="6" r="4" fill="currentColor"></circle>
                                            <ellipse cx="9.00098" cy="17.001" rx="7" ry="4"
                                                fill="currentColor"></ellipse>
                                        </svg>
                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">حساب
                                            إداري</span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if (in_array('admin.user.trainer.index', $userPermissions) || auth()->id() == 1)
                            <li class="menu nav-item">
                                <a href="{{ route('admin.user.trainer.index') }}" class="nav-link group">
                                    <div class="flex items-center">

                                        <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="15" cy="6" r="3"
                                                fill="currentColor"></circle>
                                            <ellipse opacity="0.5" cx="16" cy="17" rx="5"
                                                ry="3" fill="currentColor"></ellipse>
                                            <circle cx="9.00098" cy="6" r="4" fill="currentColor"></circle>
                                            <ellipse cx="9.00098" cy="17.001" rx="7" ry="4"
                                                fill="currentColor"></ellipse>
                                        </svg>
                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">المدرب</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if (in_array('admin.user.trainee.index', $userPermissions) || auth()->id() == 1)
                            <li class="nav-item">
                                <a href="{{ route('admin.user.trainee.index') }}" class="group">
                                    <div class="flex items-center">

                                        <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="15" cy="6" r="3"
                                                fill="currentColor"></circle>
                                            <ellipse opacity="0.5" cx="16" cy="17" rx="5"
                                                ry="3" fill="currentColor"></ellipse>
                                            <circle cx="9.00098" cy="6" r="4" fill="currentColor"></circle>
                                            <ellipse cx="9.00098" cy="17.001" rx="7" ry="4"
                                                fill="currentColor"></ellipse>
                                        </svg>
                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">المتدربين
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <!-- المهام -->
                <x-nav-header title='المهام' />
             
                <li class="menu nav-item">
                    <a href="{{ route('admin.task.index') }}" class="nav-link group">
                        <div class="flex items-center">

                            <svg class="group-hover:!text-primary shrink-0" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22Z"
                                    fill="currentColor" />
                                <path
                                    d="M18.75 8C18.75 8.41421 18.4142 8.75 18 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H18C18.4142 7.25 18.75 7.58579 18.75 8Z"
                                    fill="currentColor" />
                                <path
                                    d="M18.75 12C18.75 12.4142 18.4142 12.75 18 12.75H6C5.58579 12.75 5.25 12.4142 5.25 12C5.25 11.5858 5.58579 11.25 6 11.25H18C18.4142 11.25 18.75 11.5858 18.75 12Z"
                                    fill="currentColor" />
                                <path
                                    d="M18.75 16C18.75 16.4142 18.4142 16.75 18 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H18C18.4142 15.25 18.75 15.5858 18.75 16Z"
                                    fill="currentColor" />
                            </svg>
                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                قائمة مهامي
                            </span>
                        </div>
                    </a>
                </li>

                <!-- الرسائل -->
                <x-nav-header title='التواصل' />
              

                <li class="menu nav-item">
                    <a href="{{ route('admin.message.send.create') }}" class="nav-link group">
                        <div class="flex items-center">

                            <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 5C24 6.65685 22.6569 8 21 8C19.3431 8 18 6.65685 18 5C18 3.34315 19.3431 2 21 2C22.6569 2 24 3.34315 24 5Z"
                                    fill="#3b7"></path>
                                <path
                                    d="M17.2339 7.46394L15.6973 8.74444C14.671 9.59966 13.9585 10.1915 13.357 10.5784C12.7747 10.9529 12.3798 11.0786 12.0002 11.0786C11.6206 11.0786 11.2258 10.9529 10.6435 10.5784C10.0419 10.1915 9.32941 9.59966 8.30315 8.74444L5.92837 6.76546C5.57834 6.47377 5.05812 6.52106 4.76643 6.87109C4.47474 7.22112 4.52204 7.74133 4.87206 8.03302L7.28821 10.0465C8.2632 10.859 9.05344 11.5176 9.75091 11.9661C10.4775 12.4334 11.185 12.7286 12.0002 12.7286C12.8154 12.7286 13.523 12.4334 14.2495 11.9661C14.947 11.5176 15.7372 10.859 16.7122 10.0465L18.3785 8.65795C17.9274 8.33414 17.5388 7.92898 17.2339 7.46394Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M18.4538 6.58719C18.7362 6.53653 19.0372 6.63487 19.234 6.87109C19.3965 7.06614 19.4538 7.31403 19.4121 7.54579C19.0244 7.30344 18.696 6.97499 18.4538 6.58719Z"
                                    fill="currentColor"></path>
                                <path opacity="0.5"
                                    d="M16.9576 3.02099C16.156 3 15.2437 3 14.2 3H9.8C5.65164 3 3.57746 3 2.28873 4.31802C1 5.63604 1 7.75736 1 12C1 16.2426 1 18.364 2.28873 19.682C3.57746 21 5.65164 21 9.8 21H14.2C18.3484 21 20.4225 21 21.7113 19.682C23 18.364 23 16.2426 23 12C23 10.9326 23 9.99953 22.9795 9.1797C22.3821 9.47943 21.7103 9.64773 21 9.64773C18.5147 9.64773 16.5 7.58722 16.5 5.04545C16.5 4.31904 16.6646 3.63193 16.9576 3.02099Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                + رسالة جديدة
                            </span>
                        </div>
                    </a>
                </li>

                <li class="menu nav-item">
                    <a href="{{ route('admin.message.index') }}" class="nav-link group">
                        <div class="flex items-center">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  shrink-0">
                                <path opacity="0.5"
                                    d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                الرسائل
                            </span>
                        </div>
                    </a>
                </li>


                @if (in_array('permission.create', $userPermissions) || auth()->id() == 1)
                    <!-- الصلاحيات -->
                    <x-nav-header title='الصلاحيات' />
                  

                    <li class="menu nav-item">
                        <a href="{{ route('admin.profile_permission.index', 1) }}" class="nav-link group">
                            <div class="flex items-center">

                                <x-svgicon.lock />
                                <span
                                    class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                    صلاحيات المدير
                                </span>
                            </div>
                        </a>
                    </li>

                    <li class="menu nav-item">
                        <a href="{{ route('admin.profile_permission.index', 2) }}" class="nav-link group">
                            <div class="flex items-center">

                                <x-svgicon.lock />
                                <span
                                    class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                    صلاحيات المدرب
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="menu nav-item">
                        <a href="{{ route('admin.profile_permission.index', 3) }}" class="nav-link group">
                            <div class="flex items-center">

                                <x-svgicon.lock />
                                <span
                                    class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                    صلاحيات المتدرب
                                </span>
                            </div>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </nav>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("sidebar", () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));
    });
</script>
