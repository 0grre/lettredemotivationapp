<x-authenticated-layout>
    <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h2 class="text-4xl font-extrabold dark:text-white">Merci de votre inscription !</h2>
                <p class="my-4 text-lg text-gray-500 dark:text-gray-400">Avant de commencer, vérifiez votre adresse e-mail en cliquant sur le lien que vous venez de recevoir.</p>
                <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Si vous n'avez pas reçu
                    l'e-mail, nous vous en enverrons volontiers un autre.</p>
                <form method="post" action="{{ route('verification.send') }}">
                    @csrf
                    @method('post')
                    <button
                        class="inline-flex items-center text-lg text-primary-700 dark:text-primary-600 hover:underline">
                        Renvoyer l'e-mail de vérification
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>
                    @if (session('status') == 'verification-link-sent')
                        <div class="mt-2 text-sm text-green-600 dark:text-green-400">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </div>
                @endif
            </div>
        </div>
    </div>
</x-authenticated-layout>
