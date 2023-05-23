<x-authenticated-layout>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $letter->title }}</h1>
                </header>
                <p class="whitespace-pre-line text-justify">{{ $letter->text }}</p>
            </article>
        </div>
    </main>
{{--            <a href="{{'/' . $letter->id}}">--}}
{{--                <x-secondary-button>--}}
{{--                    Modifier--}}
{{--                </x-secondary-button>--}}
{{--            </a>--}}
{{--            <a href="{{'download/' . $letter->id}}">--}}
{{--                <x-primary-button>--}}
{{--                    Télécharger--}}
{{--                </x-primary-button>--}}
{{--            </a>--}}

</x-authenticated-layout>
