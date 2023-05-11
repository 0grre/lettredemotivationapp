<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Dans un premier temps.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Indique nous le poste auquel tu veux postuler et tes années d'expériences.") }}
        </p>
    </header>

    <form method="post" action="{{ route('letters.create.step.one.post') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="job" :value="__('Écris ici l\'intitulé du job de tes rêves')"/>
            <x-text-input required id="job" name="job" type="text" placeholder="Écris ici l'intitulé du job de tes rêves" class="mt-1 block w-full" autocomplete="job" autofocus/>
            <x-error field="job" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
        </div>

        <div>
            <x-input-label for="experience" :value="__('Tu as déjà bossé ? Combien de temps ?')"/>
            <select required name="experience" id="experience" class="mt-1 block w-full focus:outline-none border py-3 appearance-none bg-slate-50 border-slate-200 focus:bg-white focus:border-accent-500 focus:ring-accent-500 placeholder-slate-400 px-3 rounded-xl sm:text-sm text-accent-500">
                <option disabled selected>On a besoin de connaître tes années d'expériences</option>
                <option value="0">C'est ma première fois</option>
                <option value="1">1 an ou moins</option>
                <option value="2">2 ans</option>
                <option value="3">3 ans</option>
                <option value="4">4 ans ou plus</option>
            </select>
            <x-error field="experience" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Questions suivantes') }}</x-primary-button>
        </div>
    </form>
</section>
