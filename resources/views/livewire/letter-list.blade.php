<section class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-12">
    @if(sizeof($letters) > 0)
    <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-3xl">
        <div class="max-w-xl">
            <h2 class="mb-6 text-xl font-bold text-gray-900 dark:text-white">Liste des lettres</h2>
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                             fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <input type="text" id="simple-search"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Recherche"
                           required=""
                           wire:model="search">
                </div>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-6">
        @foreach($letters as $letter)
            <div class="mx-auto flex flex-col justify-between max-w-sm h-72 p-6 bg-white border border-gray-200 rounded-lg shadow dark:border-gray-700">
                <a href="{{'letters/' . $letter->id}}">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $letter->appellation->libelle }}</h5>
                </a>
                <div>
                    <p class="mb-3 font-normal text-gray-700">Candidature chez {{ $letter->company }} dans la ville
                        de {{ $letter->localization }}</p>
                    <span class="text-sm text-gray-500">{{ $letter->updated_at }}</span>
                </div>
            </div>
        @endforeach
    </div>
    @else
        <div class="mx-auto max-w-screen-md text-center">
            <div class="flex flex-col justify-center mt-12 lg:mt-24 pt-12 lg:pt-24">
                <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-gray-900 dark:text-white">
                    🙈
                    <br>
                    Oups !
                </h1>
                <p class="mb-6 text-2xl font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                    Aucunes lettres à afficher.
                </p>
                <a href="{{ route('letters.create') }}" class="mx-auto text-center text-primary-600x hover:underline font-medium text-xl inline-flex items-center">
                    Pour en créer une, c'est par ici
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    @endif
</section>
