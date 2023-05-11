<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Nous voilà à la dernière étape.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Il nous faut évidement les classiques informations de base.') }}
        </p>
    </header>

    <form method="post" action="{{ route('letters.create.step.four.post') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="firstname" :value="__('Ton prénom')"/>
            <x-text-input required id="firstname" name="firstname" type="text" placeholder="Ton prénom" class="mt-1 block w-full" autofocus/>
            <x-error field="firstname" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Ton nom de famille')"/>
            <x-text-input required id="lastname" name="lastname" type="text" placeholder="Ton nom de famille" class="mt-1 block w-full"/>
            <x-error field="lastname" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Tout est prêt, Let\'s go !') }}</x-primary-button>
        </div>
    </form>
</section>
