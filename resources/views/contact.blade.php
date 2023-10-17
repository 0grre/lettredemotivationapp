<x-guest-layout>
    <div class="mx-auto mt-24 px-4 lg:px-6 py-6 sm:py-12 lg:py-24 gap-8 xl:gap-16 lg:grid lg:grid-cols-2">
        <div class="hidden lg:flex justify-center pt-6 mt-0 mb-auto lg:mx-12">
            <img class="mt-6" src="{{ asset('assets/undraw/undraw_personal_text_re_vqj3.svg') }}" alt="dashboard image">
        </div>
        <div class="max-w-xl mx-6 lg:mx-12">
            <h2 class="mb-6 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Besoin d'informations
                ?</h2>
            <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Envoyez nous un message et nous y
                répondrons au plus vite</p>
            <form method="post" action="{{ route('contact.send') }}" class="mt-6 space-y-6">
                @csrf
                @method('post')
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                        nom</label>
                    <input type="text" name="name" id="name" autocomplete="name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Jean-Michel ..."
                           required/>
                    <x-error field="name" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                        email</label>
                    <input type="email" name="email" id="email" autocomplete="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="jeanmich62@gmail.com ..."
                           required/>
                    <x-error field="email" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                </div>
                <div class="sm:col-span-2">
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sujet de
                        la demande</label>
                    <input type="text" name="subject" id="subject" autocomplete="lastName"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Demande d'informations ..."
                           required>
                    <x-error field="subject" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                        message</label>
                    <textarea name="message" id="message" rows="5"
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="Message ..."
                              required></textarea>
                    <x-error field="message" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2"/>
                </div>
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-8 text-sm font-medium text-center text-white bg-primary-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    {{ __('Envoyer la demande') }}
                    <svg class="ml-3 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                @if (Session::has('success'))
                    <p class="block mt-2 text-sm font-medium text-green-600 dark:text-white">{{ Session::get('success') }}</p>
                @endif
                @error('error_mail')
                <p class="block mt-2 text-sm font-medium text-red-600 dark:text-white">{{$message}}</p>
                @enderror
            </form>
        </div>
    </div>
</x-guest-layout>
