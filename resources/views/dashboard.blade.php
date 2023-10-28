<x-authenticated-layout>
    @error('checkout_failed')
    <div id="alert-2"
         class="flex items-center p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
         role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
             viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            {{$message}}
        </div>
        <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @enderror
    <div class="grid grid-cols-3 gap-4 mb-4">
        <article class="flex items-center gap-4 rounded-lg border border-gray-100 bg-white p-6 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800">
          <span class="rounded-full bg-primary-100 p-3 text-primary-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
            </svg>
          </span>
            <div>
                <p class="text-2xl font-medium text-gray-900 dark:text-white">{{ $balance }}</p>
                <p class="text-sm text-gray-500">Crédits restants</p>
            </div>
        </article>

        <article class="flex items-center gap-4 rounded-lg border border-gray-100 bg-white p-6 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800">
          <span class="rounded-full bg-primary-100 p-3 text-primary-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
          </span>
            <div>
                <p class="text-2xl font-medium text-gray-900 dark:text-white">{{ round($balance / 2, 0, PHP_ROUND_HALF_DOWN) }}</p>
                <p class="text-sm text-gray-500">Génération de lettre</p>
            </div>
        </article>
        <article class="flex items-center gap-4 rounded-lg border border-gray-100 bg-white p-6 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800">
          <span class="rounded-full bg-primary-100 p-3 text-primary-600">
            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"></path>
            </svg>
          </span>
            <div>
                <p class="text-2xl font-medium text-gray-900 dark:text-white">{{ $balance }}</p>
                <p class="text-sm text-gray-500">Modifications possibles</p>
            </div>
        </article>

        <div class="gap-4 rounded-lg border border-gray-100 bg-white shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800">
            <a href="{{ route('letters.index') }}">
                <img class="p-12" src="{{ asset('assets/undraw/undraw_subscribe_vspl.svg') }}" alt="product image" />

            <div class="px-3 pb-3">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Nombre de lettres de motivations</h5>
                <div class="flex items-center justify-between pt-3">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ sizeof(Auth::user()->letters) }}
                        <span class="text-sm text-gray-500">
                            @if( sizeof(Auth::user()->letters) > 1)
                            Lettres générées
                            @else
                            Lettre générée
                            @endif
                        </span>
                    </span>
                </div>
            </div>
            </a>
        </div>

    </div>
</x-authenticated-layout>
