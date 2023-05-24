<x-app-layout>
    <x-navigation/>
    <main class="flex flex-col justify-between min-h-screen bg-white dark:bg-gray-900">
        {{ $slot }}
        <x-footer/>
    </main>
</x-app-layout>
