<x-auth-layout>
    <div class="flex flex-col items-center justify-center py-12 mx-6 sm:mx-auto lg:py-24 mt-24 mb-12">
        <div class="w-full bg-white rounded-3xl shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-12">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Créer un compte
                </h1>
                <x-google.login/>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Ton prénom et ton nom
                        </label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-600 focus:border-primary-600"
                               placeholder="Jean Michel" required>
                        <x-error field="name" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                    <div>
                        <label autofocus for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-600 focus:border-primary-600"
                               placeholder="name@company.com" required>
                        <x-error field="email" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton
                            mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-600 focus:border-primary-600"
                               required>
                        <x-error field="password" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirme ton mot de
                            passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-600 focus:border-primary-600"
                               required>
                        <x-error field="password_confirmation" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                    </div>
                    <div class="w-lg">
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                                En m'inscrivant,
                                <br class="block sm:hidden">
                                j'accepte les
                                <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="{{ route('terms') }}">
                                    les conditions d'utilisation
                                </a>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Créer un compte
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Déjà un compte ?
                        <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                            Se connecter
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
