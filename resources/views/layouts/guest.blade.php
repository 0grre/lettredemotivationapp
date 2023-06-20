<x-app-layout>
    <x-navigation/>
    <main class="flex flex-col justify-between min-h-screen">
        {{ $slot }}
        <x-footer/>
    </main>
</x-app-layout>
