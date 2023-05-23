<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="scroll-smooth selection:bg-accent-500 selection:text-white no-touchevents hydrated">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Super Lettre de Motivation') }}</title>

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
    </script>

</head>
{{ $slot }}
</html>
