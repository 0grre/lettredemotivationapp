<x-base-mail-layout subject="Réinitialisation du mot de passe">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-12">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Bonjour {{ $user->name }} !
        </h1>
        <div class="mb-4 text-md text-gray-600">
            Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre
            compte.
            <br>
            <br>
            <a target="_blank" rel="noreferrer"
               href="{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}"
               class="button w-full text-white bg-indigo-600 hover:bg-indigo-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Réinitialiser le mot de passe
            </a>
            <br>
            <br>
            Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.
            <br>
            <br>
            Si vous n'avez pas demandé de réinitialisation de mot de passe, aucune autre action n'est nécessaire.
            <br>
            <br>
            Cordialement,
            <br>
            L'équipe de {{ config('app.name') }}
        </div>
        <div class="mb-4 pt-4 text-md text-gray-600 border-t">
            Si vous rencontrez des problèmes pour cliquer sur le bouton "Réinitialiser le mot de passe", copiez et
            collez l'URL ci-dessous dans votre navigateur web :
            <a class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline"
               href="{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}">{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}</a>
        </div>
    </div>
</x-base-mail-layout>
