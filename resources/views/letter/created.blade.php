<x-guest-layout>
    <div class="mx-auto mt-24 px-4 lg:px-6 py-8 sm:py-16 w-full">
        <article class="mx-auto p-12 w-full max-w-3xl format format-sm sm:format-base lg:format-lg format-blue rounded-lg shadow-xl bg-white">
            <p class="leading-relaxed whitespace-pre-line text-justify text-lg font-semibold text-gray-900 gradient-mask-b-0 notSelectable">{{ $text }}</p>
            <form class="-translate-y-5" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-900">Pour débloquer votre lettre et
                        la télécharger, veuillez vous inscrire, c'est gratuit !</h3>
                    <!-- Name -->
                    <div>
                        <label autofocus for="name"
                               class="text-left block mb-2 text-sm font-medium text-gray-900">Votre prénom
                            et ton nom</label>
                        <input type="text" name="name" id="name" value="{{ $name }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               placeholder="Jean Dupont ..." required>
                        <x-error field="name" class="text-sm text-red-600 space-y-1 mt-2"/>
                    </div>
                    <!-- Email Address -->
                    <div>
                        <label autofocus for="email"
                               class="text-left block mb-2 text-sm font-medium text-gray-900">Votre
                            email</label>
                        <input type="email" name="email" id="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               placeholder="jean.dupont@gmail.com ..."
                               autocomplete="email"
                               required>
                        <x-error field="email" class="text-sm text-red-600 space-y-1 mt-2"/>
                    </div>
                    <!-- Password -->
                    <div>
                        <label for="password"
                               class="text-left block mb-2 text-sm font-medium text-gray-900">Votre mot de
                            passe</label>
                        <input type="password" name="password" id="password" placeholder="Votre super mot de passe ..."
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               required>
                        <x-error field="password" class="text-sm text-red-600 space-y-1 mt-2"/>
                    </div>
                    <!-- Confirmation Password -->
                    <div>
                        <label for="password_confirmation"
                               class="text-left block mb-2 text-sm font-medium text-gray-900">Confirme
                            ton mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               placeholder="Votre super mot de passe ..."
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               required>
                        <x-error field="password_confirmation"
                                 class="text-sm text-red-600 space-y-1 mt-2"/>
                    </div>
                    <!-- Accept Terms -->
                    <div class="flex items-start">
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500">En m'inscrivant,
                                j'accepte les <a
                                    class="font-medium text-primary-600 hover:underline"
                                    href="{{ route('terms') }}">les conditions d'utilisation</a></label>
                        </div>
                    </div>
                    <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Créer un compte
                    </button>
                </div>
            </form>
        </article>
    </div>
</x-guest-layout>
