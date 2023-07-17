<x-guest-layout>
    <!-- Session Status -->
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <x-logo.light class="w-8 h-8 mr-2 dark:hidden"/>
                <x-logo.dark class="w-8 h-8 mr-2 hidden dark:block"/>
                Super Lettre de Motivation
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Connectez vous avec votre compte
                    </h1>
                    <div class="mb-4 text-md text-gray-600 dark:text-gray-400">
                        Vous avez oublié votre mot de passe ?
                        <br>
                        <br>
                        Aucun problème. Faites-nous simplement savoir votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.
                    </div>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton email</label>
                            <input autofocus type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                            <x-error field="email" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Lien de réinitialisation du mot de passe par e-mail
                        </button>
                        <x-auth-session-status class="mb-4" :status="session('status')"/>
                    </form>
                </div>
            </div>
        </div>
</x-guest-layout>
