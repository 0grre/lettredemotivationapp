<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Super Lettre de Motivation') }}</title>

    <link rel="icon"
          href="{{ asset('assets/super.png') }}"
          id="light-scheme-icon">
    <link rel="icon"
          href="{{ asset('assets/_super.png') }}"
          id="dark-scheme-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <meta name="author" content="0grre"/>
    <meta name="your keywords" content="
    lettre de motivation,
    lettre de motivation exemple,
    exemple lettre de motivation,
    modèle lettre de motivation,
    exemple de lettre de motivation,
    lettre de motivation alternance,
    lettre de motivation parcoursup,
    lettre de motivation stage 3eme,
    lettre de motivation candidature spontanée"
    />

    <!-- Analytics   -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }

        const loading = () => {
            const spinner = document.getElementById('spinner');
            spinner.classList.remove('hidden')
            spinner.classList.add('flex')
        }
    </script>

</head>
{{--<body class="antialiased bg-cover bg-[url('https://fffuel.co/images/dddepth/dddepth-238.jpg')]">--}}
<body class="antialiased background-gradient">
<div id="spinner" class="fixed top-0 left-0 right-0 z-[60] overflow-x-hidden h-full w-full background-gradient flex-col justify-center hidden">
    <div class="py-8 px-4 flex flex-col justify-center mx-auto min-h-screen max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center bg-white p-12 rounded-lg shadow-md">
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Génération
                de la lettre</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Ne t'inquiète pas l'IA est en train
                de rédiger ta lettre de motivation, soit patient ça ne devrait pas être trop long. </p>
            <div role="status">
                <svg aria-hidden="true"
                     class="inline w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-primary-600"
                     viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"/>
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
{{--<section class="min-h-screen">--}}
    {{ $slot }}
{{--</section>--}}
</body>
</html>
