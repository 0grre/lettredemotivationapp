<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <meta name="author" content="0grre" />
        <meta name="your keywords" content="wallpaper,black wallpaper, gradient wallpaper,aesthetic wallpaper,iphone wallpaper,wallpaper iphone,white wallpaper,pink wallpaper"/>
        <!-- Favicon guidelines generated with https://realfavicongenerator.net/ -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="/images/favicons/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="/images/favicons/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/images/favicons/favicon-16x16.png"
        />
        <link rel="manifest" href="/images/favicons/site.webmanifest" />
        <link
            rel="mask-icon"
            href="/images/favicons/safari-pinned-tab.svg"
            color="#ffffff"
        />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="theme-color" content="#ffffff" />

        <!--Ionicons -->
        <script
            type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
        ></script>

        <!--

        https://rsms.me/inter/
        ______________________________________________________________________
        //Using Inter is as easy as downloading & installing the font files.
        //If you're making a web thing, you can use the following HTML and CSS:
        ______________________________________________________________________
        -->
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

        <!---- Alpine  -->
        <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
        <!-- Analytics   -->

        <script async defer data-website-id="ba512e9f-3bba-425f-9b1a-186fa5755e5d" src="https://stats.andreuzza.com/umami.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white">
        {{ $slot }}
    </body>
</html>
