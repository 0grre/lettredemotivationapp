<header>
    <nav class="w-full fixed z-70">
        <div class="flex flex-wrap justify-between items-center mx-6 sm:mx-12 xl:mx-24 mt-6 px-6 py-3 xl:px-8 xl:py-4 rounded-3xl shadow-lg bg-white/95 border border-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
            <a href="/"
               class="items-center self-center text-2xl font-semibold whitespace-nowrap dark:text-white flex flex-row">
                <h1 class="hidden sm:flex capitalize items-center font-extrabold dark:text-white">
                    lettre de motivation
                    <span class="flex normal-case bg-primary-100 text-primary-800 ml-1 px-1.5 py-0.5 rounded">.app</span>
                </h1>
                <span class="flex sm:hidden normal-case bg-primary-100 text-primary-800 ml-1 px-1.5 py-0.5 rounded">.app</span>
            </a>
            <div class="flex items-center xl:order-2">
                @auth
                    <x-user-navigation/>
                @else
                    <a href="{{ route('login') }}"
                       class="hidden xl:flex text-gray-800 dark:text-white hover:bg-gray-50 font-medium rounded-lg text-sm px-4 xl:px-5 py-2 xl:py-2.5 mr-2 dark:hover:bg-gray-700">
                        {{ __('Connexion') }}
                    </a>
                    <a href="{{ route('register') }}" class="hidden xl:flex text-white bg-primary-600 hover:bg-primary-700 font-medium rounded-lg text-sm px-4 xl:px-5 py-2 xl:py-2.5 mr-2">
                        {{ __('Commencer') }}
                    </a>
                    <button id="theme-toggle" type="button" class="text-gray-800 dark:text-white hover:bg-gray-50 font-medium rounded-lg text-sm px-3 py-2 xl:py-2.5 dark:hover:bg-gray-700">
                        <svg id="theme-toggle-dark-icon"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                        <svg id="theme-toggle-light-icon"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </button>
                @endauth
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg xl:hidden hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full xl:flex xl:w-auto xl:order-1" id="mobile-menu-2">
                <ul class="mx-auto flex flex-col mt-4 font-medium xl:flex-row xl:space-x-8 xl:mt-0">
                    <li>
                        <a href="/#why" class="capitalize block py-2 text-gray-700 border-b border-gray-100 hover:bg-gray-50 xl:hover:bg-transparent xl:border-0 xl:hover:text-primary-700 xl:p-0 dark:text-gray-400 xl:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white xl:dark:hover:bg-transparent dark:border-gray-700">
                            pourquoi nous &darr;
                        </a>
                    </li>
                    <li>
                        <a href="/#how" class="capitalize block py-2 text-gray-700 border-b border-gray-100 hover:bg-gray-50 xl:hover:bg-transparent xl:border-0 xl:hover:text-primary-700 xl:p-0 dark:text-gray-400 xl:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white xl:dark:hover:bg-transparent dark:border-gray-700">
                            principe &darr;
                        </a>
                    </li>
                    <li>
                        <a href="/#features" class="capitalize block py-2 text-gray-700 border-b border-gray-100 hover:bg-gray-50 xl:hover:bg-transparent xl:border-0 xl:hover:text-primary-700 xl:p-0 dark:text-gray-400 xl:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white xl:dark:hover:bg-transparent dark:border-gray-700">
                            fonctionnalités &darr;
                        </a>
                    </li>
                    <li>
                        <a href="/#pricing" class="capitalize block py-2 text-gray-700 border-b border-gray-100 hover:bg-gray-50 xl:hover:bg-transparent xl:border-0 xl:hover:text-primary-700 xl:p-0 dark:text-gray-400 xl:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white xl:dark:hover:bg-transparent dark:border-gray-700">
                           tarifs &darr;
                        </a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="block xl:hidden py-2 {{ request()->routeIs('dashboard') ? "text-white rounded bg-primary-600 xl:bg-transparent xl:text-primary-700 xl:p-0 dark:text-white" : " text-gray-700 border-b border-gray-100 hover:bg-gray-50 xl:hover:bg-transparent xl:border-0 xl:hover:text-primary-700 xl:p-0 dark:text-gray-400 xl:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white xl:dark:hover:bg-transparent dark:border-gray-700"}}">
                                Dashboard
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="block xl:hidden py-2 {{ request()->routeIs('login') ? "text-white rounded bg-primary-600 xl:bg-transparent xl:text-primary-700 xl:p-0 dark:text-white" : " text-gray-700 border-b border-gray-100 hover:bg-gray-50 xl:hover:bg-transparent xl:border-0 xl:hover:text-primary-700 xl:p-0 dark:text-gray-400 xl:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white xl:dark:hover:bg-transparent dark:border-gray-700"}}">
                                Connexion
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="block xl:hidden py-2 {{ request()->routeIs('register') ? "text-white rounded bg-primary-600 xl:bg-transparent xl:text-primary-700 xl:p-0 dark:text-white" : " text-gray-700 hover:bg-gray-50 xl:hover:bg-transparent xl:hover:text-primary-700 xl:p-0 dark:text-gray-400 xl:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white xl:dark:hover:bg-transparent"}}">
                                Commencer
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
