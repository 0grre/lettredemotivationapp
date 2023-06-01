<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <x-logo.light class="w-8 h-8 mr-2 dark:hidden"/>
                <x-logo.dark class="w-8 h-8 mr-2 hidden dark:block"/>
                Super Lettre de Motivation
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Créer un compte
                    </h1>
                    <x-google.login/>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <label autofocus for="name" class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton prénom et ton nom</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jean Michel" required>
                            <x-error field="name" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <div>
                            <label autofocus for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                            <x-error field="email" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <x-error field="password" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirme ton mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <x-error field="password_confirmation" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" name="terms" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">J'accepte les <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="{{ route('terms') }}">les conditions d'utilisation</a></label>
                            </div>
                            <x-error field="terms" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Déjà un compte ? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Se connecter</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
