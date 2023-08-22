<section>
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Nouveau mot de passe</h2>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
            <div class="sm:col-span-2">
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Mot de passe actuel
                </label>
                <input id="current_password" name="current_password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Mot de passe actuel" required>
                <x-error field="current_password" class="mt-2 text-sm text-red-600 dark:text-red-500"/>
            </div>
            <div class="sm:col-span-2">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nouveau mot de passe
                </label>
                <input id="password" name="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Nouveau mot de passe" required>
                <x-error field="password" class="mt-2 text-sm text-red-600 dark:text-red-500"/>
            </div>
            <div class="sm:col-span-2">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Confirmation du mot de passe
                </label>
                <input autocomplete="password" id="password_confirmation" name="password_confirmation" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Confirmation du mot de passe" required>
                <x-error field="password_confirmation" class="mt-2 text-sm text-red-600 dark:text-red-500"/>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700">
                Enregistrer
            </button>
        </div>
    </form>
</section>
