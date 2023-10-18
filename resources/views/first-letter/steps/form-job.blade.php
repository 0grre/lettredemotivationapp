<div class="hidden lg:flex justify-center pt-6 mt-0 mb-auto lg:mx-12">
    <img src="{{ asset('assets/undraw/undraw_career_progress_ivdb.svg') }}" alt="career progress image">
</div>
<div class="max-w-xl mx-6 lg:mx-12">
    <ol class="mb-6 flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
        <li class="flex md:w-full items-center text-primary-600 dark:text-primary-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-3 after:text-gray-200 dark:after:text-gray-500">
            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd">
                </path>
            </svg>
            Job <span class="hidden sm:inline-flex sm:ml-3">Info</span>
        </span>
        </li>
        <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-3 after:text-gray-200 dark:after:text-gray-500">
            <span class="mr-2">2</span>Société <span class="hidden sm:inline-flex sm:ml-3">Info</span>
        </span>
        </li>
        <li class="flex items-center">
            <span class="mr-2">3</span>Nom <span class="hidden sm:inline-flex sm:ml-3">Prénom</span>
        </li>
    </ol>
    <h2 class="mb-6 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
        Dans un premier temps.
    </h2>
    <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">
        Indiquez nous le job de vos rêves (ou pas) auquel vous voulez postuler, le type de contrat et le nombre d'années d'expériences.
    </p>
    <form method="post" action="{{ route('letters.create.step.job.post') }}">
        @csrf
        @method('post')
        <div class="grid sm:grid-cols-2 gap-6">
            <div class="sm:col-span-2">
                <label for="localization"
                       class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">
                    Le poste
                </label>
                <appellation-list :appellations="{{ $appellations }}"></appellation-list>
                <x-error field="appellation" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-3"/>
            </div>
            <div class="sm:col-span-2">
                <label for="contract_type" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">
                    Type de contrat
                </label>
                <select id="contract_type" name="contract_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option disabled selected>Candidature spontanée, CDI ou même stage ?</option>
                    <option value="stage">Stage</option>
                    <option value="bénévolat">Bénévolat</option>
                    <option value="apprentissage">Apprentissage</option>
                    <option value="alternance">Alternance</option>
                    <option value="CDD">CDD</option>
                    <option value="CDI">CDI</option>
                </select>
                <x-error field="contract_type" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-3"/>
            </div>
            <div class="sm:col-span-2">
                <label for="experience" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">
                    Ton expérience
                </label>
                <select id="experience" required name="experience" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option disabled selected>On a besoin de connaître vos années d'expériences</option>
                    <option value="0">C'est ma première fois</option>
                    <option value="1">1 an ou moins</option>
                    <option value="2">2 ans</option>
                    <option value="3">3 ans</option>
                    <option value="4">4 ans ou plus</option>
                </select>
                <x-error field="experience" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-3"/>
            </div>
        </div>
        <button type="submit" class="inline-flex items-center px-6 py-3 mt-12 text-sm font-medium text-center text-white bg-primary-600 rounded-lg hover:bg-primary-800">
            {{ __('Questions suivantes') }}
            <svg class="ml-3 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </form>
</div>
