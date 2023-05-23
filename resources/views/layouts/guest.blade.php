<x-app-layout>
    <x-navigation/>
    {{ $slot }}
{{--    @if(request()->routeIs('home'))--}}
        <x-footer/>
{{--    @endif--}}
</x-app-layout>
