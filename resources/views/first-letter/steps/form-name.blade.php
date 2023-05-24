<img class="w-full dark:hidden mt-4" src="{{ env('app_url') . asset('storage/undraw/undraw_attached_file_re_0n9b.svg') }}" alt="dashboard image">
<div class="mt-4 md:mt-0">
    <ol class="my-12 flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
        <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <span class="mr-2">2</span>
            Job <span class="hidden sm:inline-flex sm:ml-2">Info</span>
        </span>
        </li>
        <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <span class="mr-2">2</span>
            Société <span class="hidden sm:inline-flex sm:ml-2">Info</span>
        </span>
        </li>
        <li class="flex items-center text-blue-600 dark:text-blue-500">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            Nom <span class="hidden sm:inline-flex sm:ml-2">Prénom</span>
        </span>
        </li>
    </ol>
    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Nous voilà à la dernière étape.</h2>
    <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Il nous faut évidement les classiques informations de base</p>

    <form method="post" action="{{ route('letters.create.step.name.post') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')
        <div class="sm:col-span-2">
            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton prénom</label>
            <input type="text" name="firstname" id="firstname"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   placeholder="Jean-Michel ..."
                   required/>
            <x-error field="firstname" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
        </div>
        <div class="sm:col-span-2">
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton nom</label>
            <input type="text" name="lastname" id="lastname"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   placeholder="Appeupré ..."
                   required>
            <x-error field="lastname" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
        </div>
        <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-8 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            {{ __('Tout est prêt, Let\'s go !') }}
            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
    </form>
</div>
