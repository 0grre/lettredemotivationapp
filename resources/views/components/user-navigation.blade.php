<div class="flex items-center lg:order-2">
    <button type="button"
        data-drawer-toggle="drawer-navigation"
        aria-controls="drawer-navigation"
        class="p-3 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
    </button>
    <!-- Dark mode -->
    <button id="theme-toggle" type="button" class="p-3 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
        <svg id="theme-toggle-dark-icon"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
        </svg>
        <svg id="theme-toggle-light-icon"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
        </svg>
    </button>
    <!-- Profile -->
    <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0"
        id="user-menu-button"
        aria-expanded="false"
        data-dropdown-toggle="dropdown">
        <span class="sr-only">Open user menu</span>
        <div class="w-8 h-8 rounded-full bg-primary-600 text-white flex justify-center items-center">
           {{  substr(Auth::user()->name, 0, 1) }}
        </div>
    </button>
    <!-- Dropdown menu -->
    <div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl" id="dropdown">
        <div class="py-3 px-6">
            <span class="block text-sm font-semibold text-gray-900 dark:text-white">
                {{ Auth::user()->name }}
            </span>
            <span class="block text-sm text-gray-900 truncate dark:text-white">
                {{ Auth::user()->email }}
            </span>
        </div>
        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
            <li>
                <a href="{{ route('profile.edit') }}"
                   class="block py-2 px-6 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                    Mon profil
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard')}}"
                   class="block py-2 px-6 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                    Dashboard
                </a>
            </li>
        </ul>
        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
            <li>
                <a href="{{ route('credits') }}" class="flex justify-between items-center py-2 px-6 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             class="mr-2 w-5 h-5 text-primary-600 dark:text-primary-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    Recharge de crédits
                  </span>
                </a>
            </li>
        </ul>
        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block py-2 px-6 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Déconnexion
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
