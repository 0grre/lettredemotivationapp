<x-guest-layout>
    <main class="pt-6 pb-8 lg:pt-8 lg:pb-10 bg-white dark:bg-gray-900">
        <div class="container px-5 py-24 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <p class="leading-relaxed whitespace-pre-line text-justify text-lg gradient-mask-b-0 notSelectable">{{ $text }}</p>
                <form class="-translate-y-5" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="space-y-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Pour débloquer votre lettre et
                            la télécharger, veuillez vous inscrire, c'est gratuit !</h3>
                        <!-- Name -->
                        <div>
                            <label autofocus for="name" class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton prénom et ton nom</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                            <x-error field="name" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <!-- Email Address -->
                        <div>
                            <label autofocus for="email" class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                            <x-error field="email" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <!-- Password -->
                        <div>
                            <label for="password" class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <x-error field="password" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <!-- Confirmation Password -->
                        <div>
                            <label for="password_confirmation" class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirme ton mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <x-error field="password_confirmation" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <!-- Accept Terms -->
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
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>
