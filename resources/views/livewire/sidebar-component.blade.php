<div>
    <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
    >
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a
                class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                href="#"
            >
                Windmill
            </a>
            <ul>
                <li class="relative px-6 py-3">
                    @if(Route::is('home'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="{{Route::is('home')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                       href="{{route('home')}}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-4">Home</span>
                    </a>
                </li>

                @auth()
                    <li class="relative px-6 py-3">
                        @if(Route::is('dashboard'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="{{Route::is('dashboard')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                           href="{{route('dashboard')}}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    @if(auth()->user()->type==='admin')
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.setup'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('admin.setup')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.setup')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Setup</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.show.cv'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('admin.show.cv')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.show.cv')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Show All Cv</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.show.payment'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('admin.show.payment')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.show.payment')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Show All Payment</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.page'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a data-turbolinks="false" class="{{Route::is('admin.page')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.page')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-4">Pages</span>
                            </a>
                        </li>
                    @else

                        <li class="relative px-6 py-3">
                            @if(Route::is('contact.request'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('contact.request')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('contact.request')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Contact Request</span>
                            </a>
                        </li>
                        @if(auth()->user()->type==='imam' || auth()->user()->type==='teacher')
                            <li class="relative px-6 py-3">
                                @if(Route::is('edit.cv'))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('edit.cv')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('edit.cv')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="ml-4">Edit Cv</span>
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                                @if(Route::is('show.cv', auth()->user()->cv->id))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('show.cv', auth()->user()->cv->id)?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('show.cv', auth()->user()->cv->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-4">View Cv</span>
                                </a>
                            </li>


                        @elseif(auth()->user()->type==='mosque' || auth()->user()->type==='madrasa')
                            <li class="relative px-6 py-3">
                                @if(Route::is('edit.edit.job'))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('edit.job')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('edit.job')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="ml-4">Edit Job</span>
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                                @if(Route::is('show.job', auth()->user()->job->id))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('show.job', auth()->user()->job->id)?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('show.job', auth()->user()->job->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-4">View job</span>
                                </a>
                            </li>
                        @endif
                    @endif
                @endauth
{{--                @foreach($pages as $page)--}}
{{--                    <li class="relative px-6 py-3">--}}
{{--                        @if(Route::is('page', $page->name) && $page->name==request()->segment(count(request()->segments())))--}}
{{--                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>--}}
{{--                        @endif--}}
{{--                        <a class="{{Route::is('page', $page->name) && $page->name==request()->segment(count(request()->segments()))?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"--}}
{{--                           href="{{route('page', $page->name)}}">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                            <span class="ml-4 capitalize">{{$page->name}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

                <li class="relative px-6 py-3">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        @click="togglePagesMenu"
                        aria-haspopup="true"
                    >
                <span class="inline-flex items-center">
                  <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path
                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                    ></path>
                  </svg>
                  <span class="ml-4">Pages</span>
                </span>
                        <svg
                            class="w-4 h-4"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                    <template x-if="isPagesMenuOpen">
                        <ul
                            x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu"
                        >
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/login.html">Login</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/create-account.html">
                                    Create account
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/forgot-password.html">
                                    Forgot password
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/404.html">404</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/blank.html">Blank</a>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>
            <div class="px-6 my-6">
                <button
                    class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Create account
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </div>
        </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    ></div>
    <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click="closeSideMenu"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
    >
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a
                class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                href="#"
            >
                Windmill
            </a>
            <ul>
                <li class="relative px-6 py-3">
                    @if(Route::is('home'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    @endif
                    <a class="{{Route::is('home')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                       href="{{route('home')}}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-4">Home</span>
                    </a>
                </li>

                @auth()
                    <li class="relative px-6 py-3">
                        @if(Route::is('dashboard'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="{{Route::is('dashboard')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                           href="{{route('dashboard')}}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    @if(auth()->user()->type==='admin')
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.setup'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('admin.setup')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.setup')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Setup</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.show.cv'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('admin.show.cv')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.show.cv')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Show All Cv</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.show.payment'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('admin.show.payment')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.show.payment')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Show All Payment</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            @if(Route::is('admin.page'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a data-turbolinks="false" class="{{Route::is('admin.page')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('admin.page')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-4">Pages</span>
                            </a>
                        </li>
                    @else

                        <li class="relative px-6 py-3">
                            @if(Route::is('contact.request'))
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            @endif
                            <a class="{{Route::is('contact.request')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                               href="{{route('contact.request')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">Contact Request</span>
                            </a>
                        </li>
                        @if(auth()->user()->type==='imam' || auth()->user()->type==='teacher')
                            <li class="relative px-6 py-3">
                                @if(Route::is('edit.cv'))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('edit.cv')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('edit.cv')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="ml-4">Edit Cv</span>
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                                @if(Route::is('show.cv', auth()->user()->cv->id))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('show.cv', auth()->user()->cv->id)?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('show.cv', auth()->user()->cv->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-4">View Cv</span>
                                </a>
                            </li>


                        @elseif(auth()->user()->type==='mosque' || auth()->user()->type==='madrasa')
                            <li class="relative px-6 py-3">
                                @if(Route::is('edit.edit.job'))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('edit.job')?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('edit.job')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="ml-4">Edit Job</span>
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                                @if(Route::is('show.job', auth()->user()->job->id))
                                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                                @endif
                                <a class="{{Route::is('show.job', auth()->user()->job->id)?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"
                                   href="{{route('show.job', auth()->user()->job->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-4">View job</span>
                                </a>
                            </li>
                        @endif
                    @endif
                @endauth
{{--                @foreach($pages as $page)--}}
{{--                    <li class="relative px-6 py-3">--}}
{{--                        @if(Route::is('page', $page->name) && $page->name==request()->segment(count(request()->segments())))--}}
{{--                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>--}}
{{--                        @endif--}}
{{--                        <a class="{{Route::is('page', $page->name) && $page->name==request()->segment(count(request()->segments()))?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"--}}
{{--                           href="{{route('page', $page->name)}}">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                            <span class="ml-4 capitalize">{{$page->name}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
                <li class="relative px-6 py-3">
                    {{--                    @if(Route::is('page', $page->name) && $page->name==request()->segment(count(request()->segments())))--}}
                    {{--                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>--}}
                    {{--                    @endif--}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-4 capitalize">{{ __('Logout') }}</span>
                        </a>
                    </form>
                    {{--                    <a class="{{Route::is('page', $page->name) && $page->name==request()->segment(count(request()->segments()))?'text-purple-600':''}} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-800 dark:hover:text-gray-200"--}}
                    {{--                       href="{{route('page', $page->name)}}">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
                    {{--                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />--}}
                    {{--                        </svg>--}}
                    {{--                        <span class="ml-4 capitalize">{{$page->name}}</span>--}}
                    {{--                    </a>--}}
                </li>

                {{--                <li class="relative px-6 py-3">--}}
                {{--                    <button--}}
                {{--                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"--}}
                {{--                        @click="togglePagesMenu"--}}
                {{--                        aria-haspopup="true"--}}
                {{--                    >--}}
                {{--                <span class="inline-flex items-center">--}}
                {{--                  <svg--}}
                {{--                      class="w-5 h-5"--}}
                {{--                      aria-hidden="true"--}}
                {{--                      fill="none"--}}
                {{--                      stroke-linecap="round"--}}
                {{--                      stroke-linejoin="round"--}}
                {{--                      stroke-width="2"--}}
                {{--                      viewBox="0 0 24 24"--}}
                {{--                      stroke="currentColor"--}}
                {{--                  >--}}
                {{--                    <path--}}
                {{--                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"--}}
                {{--                    ></path>--}}
                {{--                  </svg>--}}
                {{--                  <span class="ml-4">Pages</span>--}}
                {{--                </span>--}}
                {{--                        <svg--}}
                {{--                            class="w-4 h-4"--}}
                {{--                            aria-hidden="true"--}}
                {{--                            fill="currentColor"--}}
                {{--                            viewBox="0 0 20 20"--}}
                {{--                        >--}}
                {{--                            <path--}}
                {{--                                fill-rule="evenodd"--}}
                {{--                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
                {{--                                clip-rule="evenodd"--}}
                {{--                            ></path>--}}
                {{--                        </svg>--}}
                {{--                    </button>--}}
                {{--                    <template x-if="isPagesMenuOpen">--}}
                {{--                        <ul--}}
                {{--                            x-transition:enter="transition-all ease-in-out duration-300"--}}
                {{--                            x-transition:enter-start="opacity-25 max-h-0"--}}
                {{--                            x-transition:enter-end="opacity-100 max-h-xl"--}}
                {{--                            x-transition:leave="transition-all ease-in-out duration-300"--}}
                {{--                            x-transition:leave-start="opacity-100 max-h-xl"--}}
                {{--                            x-transition:leave-end="opacity-0 max-h-0"--}}
                {{--                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"--}}
                {{--                            aria-label="submenu"--}}
                {{--                        >--}}
                {{--                            <li--}}
                {{--                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"--}}
                {{--                            >--}}
                {{--                                <a class="w-full" href="pages/login.html">Login</a>--}}
                {{--                            </li>--}}
                {{--                            <li--}}
                {{--                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"--}}
                {{--                            >--}}
                {{--                                <a class="w-full" href="pages/create-account.html">--}}
                {{--                                    Create account--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li--}}
                {{--                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"--}}
                {{--                            >--}}
                {{--                                <a class="w-full" href="pages/forgot-password.html">--}}
                {{--                                    Forgot password--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li--}}
                {{--                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"--}}
                {{--                            >--}}
                {{--                                <a class="w-full" href="pages/404.html">404</a>--}}
                {{--                            </li>--}}
                {{--                            <li--}}
                {{--                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"--}}
                {{--                            >--}}
                {{--                                <a class="w-full" href="pages/blank.html">Blank</a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </template>--}}
                {{--                </li>--}}
            </ul>
            <div class="px-6 my-6">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Create account
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </div>
        </div>
    </aside>

</div>
