<x-guest-layout>
    <x-app>
        <section class="bg-white dark:bg-gray-900">
            <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                @include('first-letter.steps.form-' . $step)
            </div>
        </section>
    </x-app>
</x-guest-layout>
