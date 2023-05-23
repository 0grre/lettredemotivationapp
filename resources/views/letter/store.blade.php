<x-authenticated-layout>
    <x-app>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('Nouvelle lettre de motivation') }}</h2>
            <form  method="post" action="{{ route('letters.create.post') }}">
                @csrf
                @method('post')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="localization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton job</label>
                        <appellation-list :appellations="{{ $appellations }}"></appellation-list>
                        <x-error field="job" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton expérience</label>
                        <select id="experience" required name="experience" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>On a besoin de connaître tes années d'expériences</option>
                            <option value="0">C'est ma première fois</option>
                            <option value="1">1 an ou moins</option>
                            <option value="2">2 ans</option>
                            <option value="3">3 ans</option>
                            <option value="4">4 ans ou plus</option>
                        </select>
                        <x-error field="experience" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">La société</label>
                        <input type="text" name="company" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="Dis nous le nom de la boîte que tu veux rejoindre"
                               required/>
                        <x-error field="company" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="localization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">La ville</label>
                        <input type="text" name="localization" id="localization" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="Tu peux ajouter la ville de la société"
                               required>
                        <x-error field="localization" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    {{ __('Tout est prêt, Let\'s go !') }}
                </button>
            </form>
        </div>
    </section>
    </x-app>
</x-authenticated-layout>
