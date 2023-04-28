<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Nous voilà à la dernière étape.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Il nous faut évidement les classiques informations de base.') }}
        </p>
    </header>

    <form method="post" action="{{ route('letter.generate') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="firstname" :value="__('Ton prénom')"/>
            <x-text-input id="firstname" name="firstname" type="text" placeholder="Ton prénom" class="mt-1 block w-full"/>
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Ton nom de famille')"/>
            <x-text-input id="lastname" name="lastname" type="text" placeholder="Ton nom de famille" class="mt-1 block w-full"/>
        </div>

        <div>
            <x-input-label for="age" :value="__('(Optionnel) tu peux préciser ton age mais ce n\'est pas obligatoire')"/>
            <x-text-input id="age" name="age" type="text" placeholder="(Optionnel) tu peux préciser ton age mais ce n'est pas obligatoire" class="mt-1 block w-full"/>
        </div>

        <x-input-label for="address" :value="__('(Optionnel) tu peux ajouter ton adresse postale')"/>
        <x-text-input id="address" name="address" type="text" placeholder="(Optionnel) tu peux également ajouter ton adresse postale" class="mt-1 block w-full"/>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Tout est prêt, Let\'s go !') }}</x-primary-button>
        </div>
    </form>
</section>
