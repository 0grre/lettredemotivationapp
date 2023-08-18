<section class="h-screen flex w-full pt-3 pb-16">
    <div class="background-gradient mx-12 rounded-3xl h-full w-full">
        <div class="flex flex-col justify-end h-full py-8 px-4 mx-auto lg:py-16 lg:px-12">
            <h1 class="mb-6 w-3/4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl xl:text-7xl text-white">
                Générez des
                <span class="text-emerald-300">
                        lettres de motivation
                    </span>
                professionnelles en quelques clics grâce à notre IA.
            </h1>
            <div class="flex flex-col mt-3 mb-6 space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                <a href="{{ route('letters.create.step.job') }}"
                   class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700">
                    Je teste ! 👉
                </a>
                <a href="{{ route('login') }}"
                   class="bg-white inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100">
                    S'inscrire gratuitement 🎉
                </a>
            </div>
        </div>
    </div>
</section>
