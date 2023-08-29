<x-app-layout>
    <x-navigation/>
    @if(request()->routeIs('home') or request()->routeIs('login') or request()->routeIs('register') or request()->routeIs('pricing'))
        <main class="flex flex-col justify-between min-h-screen bg-white dark:bg-gray-900">
            {{ $slot }}
            <x-footer/>
        </main>
    @else
        <main class="pt-3 flex flex-col justify-between min-h-screen bg-white dark:bg-gray-900">
            <div class="bg-white mx-3 sm:mx-6 lg:mx-12 mb-12 rounded-3xl h-full border border-gray-100 dark:bg-gray-800 dark:border-gray-600">
                {{ $slot }}
            </div>
            <x-footer/>
        </main>
    @endif
</x-app-layout>
