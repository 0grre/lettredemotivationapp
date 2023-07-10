<x-authenticated-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4 p-4 pt-20">
        @foreach($letters as $letter)
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{'letters/' . $letter->id}}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $letter->appellation->libelle }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Candidature chez {{ $letter->company }} dans la ville de {{ $letter->localization }}</p>
                <span class="text-sm text-gray-500 dark:text-gray-300">{{ $letter->updated_at }}</span>
            </div>
        @endforeach
    </div>
    <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"
    ></div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
    </div>
    <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"
    ></div>
    <div class="grid grid-cols-2 gap-4">
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
        <div
            class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
        ></div>
    </div>
</x-authenticated-layout>

{{--<x-app-layout>--}}
{{--    <section class="bg-white dark:bg-gray-900">--}}
{{--        <div class="container px-6 py-10 mx-auto">--}}
{{--            <h1 class="text-2xl font-semibold text-gray-800 lg:text-3xl dark:text-white">Mes lettres de motivation</h1>--}}
{{--            <a href="{{ route('letters.create') }}">--}}
{{--                <x-primary-button>--}}
{{--                    Créer une nouvelle lettre--}}
{{--                </x-primary-button>--}}
{{--            </a>--}}
{{--            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">--}}
{{--                @foreach($letters as $letter)--}}
{{--                    <div class="lg:flex">--}}
{{--                        <img class="object-cover w-full h-56 rounded-lg lg:w-64"--}}
{{--                             src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"--}}
{{--                             alt="">--}}

{{--                        <div class="flex flex-col justify-between py-6 lg:mx-6">--}}
{{--                            <a href="{{'letters/' . $letter->id}}"--}}
{{--                               class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">--}}
{{--                                {{ $letter->title }}--}}
{{--                            </a>--}}

{{--                            <span class="text-sm text-gray-500 dark:text-gray-300">{{ $letter->updated_at }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</x-app-layout>--}}
