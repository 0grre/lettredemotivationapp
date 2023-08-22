<x-guest-layout>
    <x-app>
        <div class="mx-auto mt-24 px-4 lg:px-6 py-6 sm:py-12 lg:py-24 gap-8 xl:gap-16 lg:grid lg:grid-cols-2">
            @include('first-letter.steps.form-' . $step)
        </div>
    </x-app>
</x-guest-layout>
