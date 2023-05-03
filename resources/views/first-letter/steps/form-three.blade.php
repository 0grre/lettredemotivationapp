<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Le plus important maintenant, l\'entreprise.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('La lettre de motivation doit être adaptée à l\'entreprise cible pour plus de succès.') }}
        </p>
    </header>

    <form method="post" action="{{ route('letters.create.step.three.post') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')
        <div>
            <x-input-label for="company" :value="__('Dis nous le nom de la boîte que tu veux rejoindre')"/>
            <x-text-input id="company" name="company" type="text" placeholder="Dis nous le nom de la boîte que tu veux rejoindre" class="mt-1 block w-full"/>
        </div>

        <div>
            <x-input-label for="localization" :value="__('(optionnel) tu peux ajouter la ville de la société')"/>
            <x-text-input id="localization" name="localization" type="text" placeholder="(Optionnel) tu peux ajouter la ville de la société" class="mt-1 block w-full"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Plus qu\'une étape') }}</x-primary-button>
        </div>
    </form>
</section>
