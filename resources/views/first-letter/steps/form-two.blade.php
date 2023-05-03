<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Ok top ! Continuons.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Ici on a besoin d'informations concernant le job.") }}
        </p>
    </header>

    <form method="post" action="{{ route('letters.create.step.two.post') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="sector" :value="__('Quel est le secteur d\'activité du poste ?')"/>
            <x-text-input id="sector" name="sector" type="text" placeholder="Quel est le secteur d'activité du poste ?" class="mt-1 block w-full"/>
        </div>

        <div>
            <x-input-label for="skills" :value="__('Sélectionne quelques compétences')"/>
            <x-text-input id="skills" name="skills" type="text" placeholder="Sélectionne quelques compétences" class="mt-1 block w-full"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('On continue') }}</x-primary-button>
        </div>
    </form>
</section>
