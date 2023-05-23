<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <x-logo.light class="w-8 h-8 mr-2 dark:hidden"/>
                <x-logo.dark class="w-8 h-8 mr-2 hidden dark:block"/>
                Super Lettre de Motivation
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Connectez vous avec votre compte
                    </h1>
                    <div class="py-3">
                            <span class="w-full inline-flex relative mt-3 z-0">
                                  <a href="{{ route('auth.google') }}"
                                     class="font-medium text-sm bg-white border border-slate-300 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:z-10 hover:bg-slate-50 inline-flex items-center justify-center px-4 py-3 relative rounded-xl text-slate-700 w-full"
                                     type="button">
                                      Connexion avec
                                      <span class="ml-3">
                                          <svg fill="none" height="24" viewBox="0 0 32 32" width="24"
                                               xmlns="http://www.w3.org/2000/svg">
                                              <path
                                                  d="M30.0014 16.3109C30.0014 15.1598 29.9061 14.3198 29.6998 13.4487H16.2871V18.6442H24.1601C24.0014 19.9354 23.1442 21.8798 21.2394 23.1864L21.2127 23.3604L25.4536 26.58L25.7474 26.6087C28.4458 24.1665 30.0014 20.5731 30.0014 16.3109Z"
                                                  fill="#4285F4"></path><path
                                                  d="M16.2862 30C20.1433 30 23.3814 28.7555 25.7465 26.6089L21.2386 23.1865C20.0322 24.011 18.4132 24.5866 16.2862 24.5866C12.5085 24.5866 9.30219 22.1444 8.15923 18.7688L7.9917 18.7827L3.58202 22.1272L3.52435 22.2843C5.87353 26.8577 10.6989 30 16.2862 30Z"
                                                  fill="#34A853"></path><path
                                                  d="M8.16007 18.7688C7.85848 17.8977 7.68395 16.9643 7.68395 15.9999C7.68395 15.0354 7.85849 14.1021 8.1442 13.231L8.13621 13.0455L3.67126 9.64734L3.52518 9.71544C2.55696 11.6132 2.0014 13.7444 2.0014 15.9999C2.0014 18.2555 2.55696 20.3865 3.52518 22.2843L8.16007 18.7688Z"
                                                  fill="#FBBC05"></path><path
                                                  d="M16.2863 7.4133C18.9688 7.4133 20.7783 8.54885 21.8101 9.4978L25.8418 5.64C23.3657 3.38445 20.1434 2 16.2863 2C10.699 2 5.87354 5.1422 3.52435 9.71549L8.14339 13.2311C9.30223 9.85555 12.5086 7.4133 16.2863 7.4133Z"
                                                  fill="#EB4335">
                                              </path>
                                        </svg>
                                      </span>
                                  </a>
                            </span>
                        <div class="py-3 relative">
                            <div class="flex items-center absolute inset-0"
                                 aria-hidden="true">
                                <div class="w-full border-t border-slate-300"></div>
                            </div>
                            <div class="flex relative justify-center">
                                <span class="text-sm bg-white px-2 text-slate-500">Ou continuez avec</span>
                            </div>
                        </div>
                    </div>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton email</label>
                            <input autofocus type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            <x-error field="email" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ton mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            <x-error field="password" class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" />
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Se souvenir de moi</label>
                                </div>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Mot de passe oublié ?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Connexion</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Pas encore de compte ? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">S'enregistrer</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
