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
            <select required name="sector" id="sector" class="mt-1 block w-full focus:outline-none border py-3 appearance-none bg-slate-50 border-slate-200 focus:bg-white focus:border-accent-500 focus:ring-accent-500 placeholder-slate-400 px-3 rounded-xl sm:text-sm text-accent-500" autofocus>
                <option disabled selected>Quel est le secteur d'activité du poste ?</option>
                @foreach($sectors as $sector)
                <option value="{{  $sector->libelle_sect_activite }}">{{  $sector->libelle_sect_activite }}</option>
                @endforeach
            </select>
            <x-error field="sector" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
        </div>

        <div>
            <x-input-label for="skills" :value="__('Sélectionne quelques compétences')"/>
            <x-text-input required id="skills" name="skills" type="text" placeholder="Sélectionne quelques compétences" class="mt-1 block w-full"/>
            <x-error field="skills" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('On continue') }}</x-primary-button>
        </div>
    </form>
</section>


