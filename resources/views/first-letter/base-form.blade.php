<x-guest-layout>
    <x-app>
        <section class="min-h-screen flex w-full pt-3 pb-16">
            <div class="bg-white dark:bg-gray-800 mx-3 sm:mx-6 lg:mx-12 rounded-3xl h-full w-full border border-gray-100 dark:border-gray-600">
                <div class="mx-auto mt-24 px-4 lg:px-6 py-6 sm:py-16 gap-8 xl:gap-16 lg:grid lg:grid-cols-2">
                    @include('first-letter.steps.form-' . $step)
                </div>
            </div>
        </section>
    </x-app>
</x-guest-layout>
