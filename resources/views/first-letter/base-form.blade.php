<x-guest-layout>
    <x-app>
        <div class="mx-4 sm:mx-6 lg:mx-12 my-6 sm:my-8 lg:my-24 py-8 px-6 lg:px-8 bg-white dark:bg-gray-800 max-w-screen-xl rounded-lg shadow">
            <div class="mx-auto px-4 lg:px-6 py-8 sm:py-16 gap-8 xl:gap-16 md:grid md:grid-cols-2">
                @include('first-letter.steps.form-' . $step)
            </div>
        </div>
    </x-app>
</x-guest-layout>
