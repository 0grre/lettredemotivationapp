<x-base-mail-layout subject="Réinitialisation du mot de passe">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-12">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Bonjour {{ $user->name }} !
        </h1>
        <div class="mb-4 text-md text-gray-600">
            Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail.
            <br>
            <br>
            <a target="_blank" rel="noreferrer"
               href="{{ $url }}"
               class="button w-full text-white bg-indigo-600 hover:bg-indigo-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Vérifier l'adresse e-mail
            </a>
            <br>
            <br>
            Si vous n'avez pas créé de compte, aucune action supplémentaire n'est requise.
            <br>
            <br>
            Cordialement,
            <br>
            L'équipe de {{ config('app.name') }}
        </div>
        <div class="mb-4 pt-4 text-md text-gray-600 border-t">
            Si vous rencontrez des problèmes pour cliquer sur le bouton "Vérifier l'adresse e-mail", copiez et
            collez l'URL ci-dessous dans votre navigateur web :
            <a class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline"
               href="{{ $url }} }}">{{ $url }}</a>
        </div>
    </div>
</x-base-mail-layout>
