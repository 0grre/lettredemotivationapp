<x-authenticated-layout>

    @error('insufficient_amount')
    <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            {{$message}}
            Pour recharger votre compte c'est par <a href="{{ route('credits') }}" class="font-semibold underline hover:no-underline">ici</a>.
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @enderror

    <x-app>
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-6 sm:p-12 bg-white rounded-3xl border border-gray-100 dark:bg-gray-800 dark:border-gray-600">
                <div class="max-w-xl">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('Nouvelle lettre de motivation') }}</h2>
                    <form onsubmit="loading()" method="post" action="{{ route('letters.create.post') }}">
                        @csrf
                        @method('post')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="appellation"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton
                                    job</label>
                                <appellation-list :appellations="{{ $appellations }}"></appellation-list>
                                <x-error field="appellation" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="contract_type"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de
                                    contrat</label>
                                <select id="contract_type" name="contract_type"
                                        class="bg-gray-50 focus:ring-primary-600 focus:border-primary-600 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                    <option disabled selected>Candidature spontanée, CDI ou même stage ?</option>
                                    <option value="stage">Stage</option>
                                    <option value="bénévolat">Bénévolat</option>
                                    <option value="apprentissage">Apprentissage</option>
                                    <option value="candidature spontanée">Candidature spontanée</option>
                                    <option value="alternance">Alternance</option>
                                    <option value="CDD">CDD</option>
                                    <option value="CDI">CDI</option>
                                </select>
                                <x-error field="contract_type"
                                         class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="experience"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton
                                    expérience</label>
                                <select id="experience" required name="experience"
                                        class="bg-gray-50 focus:ring-primary-600 focus:border-primary-600 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option disabled selected>On a besoin de connaître tes années d'expériences</option>
                                    <option value="0">C'est ma première fois</option>
                                    <option value="1">1 an ou moins</option>
                                    <option value="2">2 ans</option>
                                    <option value="3">3 ans</option>
                                    <option value="4">4 ans ou plus</option>
                                </select>
                                <x-error field="experience"
                                         class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="company"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">La
                                    société</label>
                                <input type="text" name="company" id="company"
                                       class="bg-gray-50 focus:ring-primary-600 focus:border-primary-600 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="Dis nous le nom de la boîte que tu veux rejoindre"
                                       autocomplete="organization"
                                       required/>
                                <x-error field="company" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="localization"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">La
                                    ville</label>
                                <input type="text" name="localization" id="localization"
                                       class="bg-gray-50 focus:ring-primary-600 focus:border-primary-600 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="(optionnel) Tu peux ajouter la ville de la société"
                                       autocomplete="street-address">
                                <x-error field="localization"
                                         class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                            </div>
                        </div>
                        <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-600 rounded-lg hover:bg-primary-800">
                            {{ __('Tout est prêt, Let\'s go !') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-app>
</x-authenticated-layout>
