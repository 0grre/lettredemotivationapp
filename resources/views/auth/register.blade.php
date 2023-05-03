<x-guest-layout>
    <section>
        <div
            class="flex justify-center min-h-full lg:px-0 md:px-12">
            <div
                class="bg-white px-4 relative flex flex-1 flex-col lg:py-24 md:flex-none md:px-28 py-10 sm:justify-center xl:py-24 z-10">
                <div
                    class="w-full lg:h-full max-w-md md:max-w-sm md:px-0 md:w-96 mx-auto sm:px-4">
                    <div class="flex flex-col">
                        <div>
                            <h2
                                class="font-medium leading-tight text-black text-xl font-display">
                                Sign up to AstroSaaS
                            </h2>
                            <div class="py-3">
              <span class="w-full inline-flex relative mt-3 z-0">
                  <a href="{{ route('auth.google') }}"
                      class="w-full focus:outline-none border py-3 bg-white border-slate-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:z-10 font-medium hover:bg-slate-50 inline-flex items-center justify-center px-4 relative rounded-xl text-slate-700 text-sm"
                      type="button"
                  ><span>Sign up with</span>
                  <span class="ml-3"
                  ><svg
                          fill="none"
                          height="24"
                          viewBox="0 0 32 32"
                          width="24"
                          xmlns="http://www.w3.org/2000/svg"
                      ><path
                              d="M30.0014 16.3109C30.0014 15.1598 29.9061 14.3198 29.6998 13.4487H16.2871V18.6442H24.1601C24.0014 19.9354 23.1442 21.8798 21.2394 23.1864L21.2127 23.3604L25.4536 26.58L25.7474 26.6087C28.4458 24.1665 30.0014 20.5731 30.0014 16.3109Z"
                              fill="#4285F4"></path><path
                              d="M16.2862 30C20.1433 30 23.3814 28.7555 25.7465 26.6089L21.2386 23.1865C20.0322 24.011 18.4132 24.5866 16.2862 24.5866C12.5085 24.5866 9.30219 22.1444 8.15923 18.7688L7.9917 18.7827L3.58202 22.1272L3.52435 22.2843C5.87353 26.8577 10.6989 30 16.2862 30Z"
                              fill="#34A853"></path><path
                              d="M8.16007 18.7688C7.85848 17.8977 7.68395 16.9643 7.68395 15.9999C7.68395 15.0354 7.85849 14.1021 8.1442 13.231L8.13621 13.0455L3.67126 9.64734L3.52518 9.71544C2.55696 11.6132 2.0014 13.7444 2.0014 15.9999C2.0014 18.2555 2.55696 20.3865 3.52518 22.2843L8.16007 18.7688Z"
                              fill="#FBBC05"></path><path
                              d="M16.2863 7.4133C18.9688 7.4133 20.7783 8.54885 21.8101 9.4978L25.8418 5.64C23.3657 3.38445 20.1434 2 16.2863 2C10.699 2 5.87354 5.1422 3.52435 9.71549L8.14339 13.2311C9.30223 9.85555 12.5086 7.4133 16.2863 7.4133Z"
                              fill="#EB4335"></path>
                    </svg>
                  </span>
                  </a>
              </span>
                                <div class="py-3 relative">
                                    <div
                                        class="flex absolute inset-0 items-center"
                                        aria-hidden="true">
                                        <div class="w-full border-t border-slate-300"></div>
                                    </div>
                                    <div class="flex relative justify-center">
                                        <span class="bg-white text-sm px-2 text-slate-500">Or continue with</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input name="hidden" autocomplete="false" style="display:none"/>
                        <input name="_redirect" type="hidden" value="#"/>
                        <div class="space-y-6">
                            <!-- Name -->
                            <div class="col-span-full">
                                <x-input-label for="name" :value="__('Name')"/>
                                <x-text-input id="name" type="text" name="name" :value="old('name')"
                                              placeholder="Type name here..."
                                              required
                                              autofocus
                                              autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>
                            <!-- Email Address -->
                            <div class="col-span-full">
                                <x-input-label for="email" :value="__('Email')"/>
                                <x-text-input id="email" type="email" name="email" :value="old('email')"
                                              placeholder="Type email here..."
                                              required
                                              autocomplete="username"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>
                            <!-- Password -->
                            <div class="col-span-full">
                                <x-input-label for="password" :value="__('Password')"/>

                                <x-text-input id="password" type="password" name="password"
                                              placeholder="Type password here..."
                                              required
                                              autocomplete="new-password"/>
                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </div>
                            <!-- Confirm Password -->
                            <div class="col-span-full">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                                              placeholder="Type confirm password here..."
                                              required
                                              autocomplete="new-password"/>

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                            </div>
                            <div class="flex">
                                <div class="flex items-start">
                                    <input
                                        class="text-accent-500 focus:ring-accent-500 border-accent-500 h-4 rounded w-4"
                                        id="remember-me"
                                        name="remember-me"
                                        type="checkbox"
                                    />
                                    <label
                                        class="font-medium text-xs block leading-tight ml-2 text-slate-500"
                                        for="remember-me"
                                    >Creating an account means you’re okay with our <a
                                            class="text-accent-500 hover:text-accent-400"
                                            href="/terms"
                                        >Terms of Service,
                                        </a><a
                                            class="text-accent-500 hover:text-accent-400"
                                            href="/privacy"
                                        >Privacy Policy
                                        </a>, and our default <a
                                            class="text-accent-500 hover:text-accent-400"
                                            href="/notifications">Notification Settings.</a
                                        >
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <button
                                    class="items-center justify-center rounded-xl focus-visible:outline-black focus:outline-none inline-flex bg-black border-2 border-black duration-200 focus-visible:ring-black hover:bg-transparent hover:border-black hover:text-black px-6 py-3 text-center text-white w-full"
                                    type="submit">Create an account
                                </button
                                >
                            </div>
                            <div class="space-y-4">
                                <p class="font-medium text-sm leading-tight text-black">
                                    Already a member? <a
                                        class="text-accent-500 hover:text-accent-400 ml-3"
                                        href="{{ route('login') }}">Sign in</a
                                    >
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
