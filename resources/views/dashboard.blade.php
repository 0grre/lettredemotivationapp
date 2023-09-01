<x-authenticated-layout>
    <div class="grid grid-cols-3 gap-4 mb-4">
        <article class="flex items-center gap-4 rounded-lg border border-gray-100 bg-white p-6">
          <span class="rounded-full bg-blue-100 p-3 text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </span>
            <div>
                <p class="text-2xl font-medium text-gray-900">{{ $amount }}</p>

                <p class="text-sm text-gray-500">Crédits restants</p>
            </div>
        </article>

        <article class="flex items-center gap-4 rounded-lg border border-gray-100 bg-white p-6">
          <span class="rounded-full bg-blue-100 p-3 text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-8 w-8"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </span>
            <div>
                <p class="text-2xl font-medium text-gray-900">{{ $amount * 2 }}</p>

                <p class="text-sm text-gray-500">Génération de lettre</p>
            </div>
        </article>
        <article class="flex items-center gap-4 rounded-lg border border-gray-100 bg-white p-6">
          <span class="rounded-full bg-blue-100 p-3 text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-8 w-8"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </span>
            <div>
                <p class="text-2xl font-medium text-gray-900">{{ $amount }}</p>

                <p class="text-sm text-gray-500">Modifications possibles</p>
            </div>
        </article>
    </div>
</x-authenticated-layout>
