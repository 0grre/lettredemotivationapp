<x-authenticated-layout>
    {{--        <main class="bg-white dark:bg-gray-900 min-h-screen">--}}
    {{--            <div id="accordion-collapse" data-accordion="collapse">--}}
    {{--                <h2 id="accordion-collapse-heading-1">--}}
    {{--                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">--}}
    {{--                        <span>Version actuelle</span>--}}
    {{--                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
    {{--                    </button>--}}
    {{--                </h2>--}}
    {{--                <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">--}}
    {{--                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">--}}
    {{--                                <article class="mx-auto max-w-2xl format format-sm sm:format-base lg:format-lg format-blue bg-white p-12 rounded-lg shadow-xl">--}}
    {{--                                    <header class="mb-6 lg:mb-6 not-format">--}}
    {{--                                        <h1 class="mb-12 text-xl font-extrabold leading-tight text-gray-900 text-center">{{ $letter->title }}</h1>--}}
    {{--                                    </header>--}}
    {{--                                    <p class="whitespace-pre-line text-justify text-gray-900">{{ $letter->text }}</p>--}}
    {{--                                </article>--}}
    {{--                            </div>--}}
    {{--                </div>--}}
    {{--                @foreach($old_letters as $old_letter)--}}
    {{--                <h2 id="accordion-collapse-heading-{{ $old_letter->id }}">--}}
    {{--                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-{{ $old_letter->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $old_letter->id }}">--}}
    {{--                        <span>Version précédente</span>--}}
    {{--                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
    {{--                    </button>--}}
    {{--                </h2>--}}
    {{--                <div id="accordion-collapse-body-{{ $old_letter->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-2">--}}
    {{--                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">--}}
    {{--                        <article class="mx-auto max-w-2xl format format-sm sm:format-base lg:format-lg format-blue bg-white p-12 rounded-lg shadow-xl">--}}
    {{--                            <header class="mb-6 lg:mb-6 not-format">--}}
    {{--                                <h1 class="mb-12 text-xl font-extrabold leading-tight text-gray-900 text-center">{{ $letter->title }}</h1>--}}
    {{--                            </header>--}}
    {{--                            <p class="whitespace-pre-line text-justify text-gray-900">{{ $old_letter->content }}</p>--}}
    {{--                        </article>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}


    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 rounded">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue bg-white p-12 rounded-lg shadow-xl">
                <header class="mb-6 lg:mb-6 not-format">
                    <h1 class="mb-12 text-xl font-extrabold leading-tight text-gray-900 text-center">{{ $letter->title }}</h1>
                </header>
                <p class="whitespace-pre-line text-justify text-gray-900">{{ $letter->text }}</p>
            </article>
        </div>
    </main>
</x-authenticated-layout>
