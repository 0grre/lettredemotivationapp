<x-guest-layout>
    {{-- Hero --}}
    <section class="background-gradient">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <a href="#"
               class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
               role="alert">
                <span
                    class="text-xs bg-primary-700 dark:bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span>
                <span class="text-sm font-medium">Accédez aux données PÔLE EMPLOI</span>
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-white">
                Obtenez votre lettre de motivation parfaite en quelques secondes.</h1>
            <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48">Générez des lettres de
                motivation professionnelles en quelques clics grâce à notre IA. Fini
                les heures passées à écrire, notre générateur de lettres de motivation vous offre un service
                rapide et efficace pour décrocher l'emploi de vos rêves.</p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{ route('letters.create.step.job') }}"
                   class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Je teste ! 👉
                </a>
                <a href="{{ route('login') }}"
                   class="bg-white dark:bg-gray-900 inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    S'inscrire gratuitement 🎉
                </a>
            </div>
        </div>
    </section>
    {{-- End Hero --}}

    {{-- Why US --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Pourquoi utiliser notre service de génération de lettre de motivation ?</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Découvrez les avantages de notre plateforme et les raisons pour lesquelles vous devriez choisir notre service</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">

                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white reveal first">
                    <a href="#">
                        <img class="p-12" src="{{ asset('assets/undraw/undraw_robotics_kep0.svg') }}"
                             alt="dashboard image">
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Des exemples de lettres
                                de motivation percutantes grâce à l'IA et à Pôle Emploi.</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Générez des lettres de motivation professionnelles
                            ou des exemple de lettre de motivation en quelques clics grâce à notre IA alimentée avec les données de Pôle Emploi.</p>
                    </div>
                </div>

                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white reveal second">
                    <a href="#">
                        <img class="p-12" src="{{ asset('assets/undraw/undraw_security_on_re_e491.svg') }}"
                             alt="dashboard image">
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">La
                                confidentialité de vos données est notre priorité absolue.</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nous nous engageons à protéger
                            votre vie privée. Vos données sont cryptées et nous ne vendons jamais vos informations
                            personnelles. Faites confiance à notre plateforme pour une expérience sécurisée et
                            sereine.</p>
                    </div>
                </div>

                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white reveal third">
                    <img class="p-12" src="{{ asset('assets/undraw/undraw_wall_post_re_y78d.svg') }}"
                         alt="dashboard image">
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Reformulez,
                            Augmentez, Réduisez pour un impact maximal !</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Avec notre fonctionnalité
                            exclusive, vous pouvez également transformer votre lettre de motivation en un atout
                            incontestable. Réformulez habilement vos phrases, réduisez la taille pour plus de concision,
                            ou amplifiez son impact en ajoutant des arguments convaincants.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- End Why US --}}

    {{-- Timeline --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Comment ça marche ?</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    Ces trois étapes simples vous permettront d'obtenir une lettre de motivation ou un exemple de lettre
                    de motivation professionnelle et personnalisée en utilisant notre service en ligne.
                </p>
            </div>
            <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                <img class="w-full" src="{{ asset('assets/undraw/undraw_project_completed_re_jr7u.svg') }}"
                     alt="dashboard image">
                <div class="mt-4 md:mt-0">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        <li class="mb-10 ml-6 p-6 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 reveal first">
                            <span class="absolute text-3xl flex items-center justify-center w-6 h-6 -left-3 ring-8 ring-white dark:ring-gray-900">
                             👨🏻‍💻
                            </span>
                            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Remplir le formulaire en sélectionnant le métier provenant des données de Pôle Emploi</h2>
                            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                <li>
                                    Sélectionnez Fournissez vos informations personnelles et professionnelles dans notre formulaire en ligne.
                                </li>
                                <li>
                                    Sélectionnez le métier ou le secteur d'emploi spécifique à partir des données officielles de Pôle Emploi.
                                </li>
                            </ul>

                        </li>
                        <li class="mb-10 ml-6 p-6 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 reveal first">
                            <span class="absolute text-3xl flex items-center justify-center w-6 h-6 -left-3 ring-8 ring-white dark:ring-gray-900">
                                ⚡️
                            </span>
                            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Modifier la lettre, ajouter ou retirer un paragraphe ou reformuler</h2>
                            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                <li>
                                    Modifiez et adaptez la lettre de motivation générée automatiquement selon vos préférences.
                                </li>
                                <li>
                                    Intégrez des paragraphes supplémentaires ou supprimez ceux qui ne sont pas pertinents pour votre situation..
                                </li>
                            </ul>
                        </li>
                        <li class="ml-6 p-6 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 reveal first">
                            <span class="absolute text-3xl flex items-center justify-center w-6 h-6 -left-3 ring-8 ring-white dark:ring-gray-900">
                                📑
                            </span>
                            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Télécharger en PDF ou
                                copier le texte pour l'utiliser dans Word ou LibreOffice</h2>
                            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                <li>
                                    Exportez votre lettre de motivation personnalisée au format PDF prêt à être utilisé.
                                </li>
                                <li>
                                    Copiez le texte de la lettre et collez-le dans votre logiciel de traitement de texte favori pour effectuer d'autres modifications ou adaptations.
                                </li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- End Timeline --}}

    {{-- Test Free --}}
    <section class="background-gradient">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-white animate-wiggle">Envie de tester ?</h2>
                <p class="mb-6 font-light text-white md:text-lg">Obtenez votre première lettre de motivation
                    gratuitement. Pas de carte de crédit requise !</p>
                <a href="{{ route('letters.create.step.job') }}"
                   class="bg-white dark:bg-gray-900 inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Tester gratuitement 🚀
                </a>
            </div>
        </div>
    </section>
    {{-- End Test Free --}}

    {{-- Features --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Nos principales fonctionnalités</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Découvrez les fonctionnalités clés qui font de notre service un choix optimal pour la génération de votre lettre de motivation ou vos exemples de lettre de motivation.</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Vos données cryptées</h3>
                    <p class="text-gray-500 dark:text-gray-400">Protection de la vie privée : Vos données personnelles sont sécurisées grâce au cryptage avancé, garantissant la confidentialité de vos informations.</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Aucune revente de données</h3>
                    <p class="text-gray-500 dark:text-gray-400">Respect de la confidentialité : Nous nous engageons à ne jamais revendre ou partager vos données personnelles avec des tiers, assurant ainsi une confidentialité totale.</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25zm.75-12h9v9h-9v-9z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Génération de lettre via IA</h3>
                    <p class="text-gray-500 dark:text-gray-400">Intelligence artificielle performante : Notre service utilise une IA avancée pour générer des lettres de motivation précises et adaptées à votre profil professionnel.</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Données Pôle Emploi</h3>
                    <p class="text-gray-500 dark:text-gray-400">Données officielles fiables : Nous utilisons les données officielles de Pôle Emploi pour garantir la pertinence et l'actualité des informations utilisées dans la génération de votre lettre de motivation.</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300">
                            <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0112.548-3.364l1.903 1.903h-3.183a.75.75 0 100 1.5h4.992a.75.75 0 00.75-.75V4.356a.75.75 0 00-1.5 0v3.18l-1.9-1.9A9 9 0 003.306 9.67a.75.75 0 101.45.388zm15.408 3.352a.75.75 0 00-.919.53 7.5 7.5 0 01-12.548 3.364l-1.902-1.903h3.183a.75.75 0 000-1.5H2.984a.75.75 0 00-.75.75v4.992a.75.75 0 001.5 0v-3.18l1.9 1.9a9 9 0 0015.059-4.035.75.75 0 00-.53-.918z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Reformulation des lettres</h3>
                    <p class="text-gray-500 dark:text-gray-400">Personnalisation facile : Vous pouvez facilement reformuler et personnaliser votre lettre de motivation générée automatiquement, en ajoutant votre touche personnelle et en adaptant le contenu à vos besoins spécifiques.</p>
                </div>
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Qualité professionnelle</h3>
                    <p class="text-gray-500 dark:text-gray-400">Résultats de qualité : Nos lettres de motivation sont conçues pour refléter un niveau de professionnalisme élevé, vous aidant à vous démarquer lors de vos candidatures.</p>
                </div>
            </div>
        </div>
    </section>
    {{-- End Features --}}

    @include("partials.pricing")
</x-guest-layout>
