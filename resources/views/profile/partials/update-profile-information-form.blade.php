<section>
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Informations utilisateur</h2>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom et Nom</label>
                <input id="name" name="name" type="text" value="{{  old('name', $user->name) }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                       placeholder="Votre prénom et nom" autofocus autocomplete="name">
                <x-error field="name" class="mt-2 text-sm text-red-600 dark:text-red-500"/>
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input id="email" name="email" type="email" value="{{  old('email', $user->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Votre adresse email" required>
                <x-error field="email" class="mt-2 text-sm text-red-600 dark:text-red-500"/>
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __("Votre adresse e-mail n'est pas vérifiée.") }}
                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md">
                                {{ __("Cliquez ici pour renvoyer l'e-mail de vérification.") }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __("Un nouveau lien de vérification a été envoyé à votre adresse e-mail.") }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700">
                Enregistrer
            </button>
        </div>
    </form>
</section>
