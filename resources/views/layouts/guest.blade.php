<x-app-layout>
    <x-navigation/>
    <main class="pt-3 flex flex-col justify-between min-h-screen bg-white dark:bg-gray-900">
        <div
            class="bg-white mx-3 sm:mx-6 lg:mx-12 mb-12 rounded-3xl h-full border border-gray-100 dark:bg-gray-800 dark:border-gray-600">
            {{ $slot }}
        </div>
        <x-footer/>
    </main>
</x-app-layout>
