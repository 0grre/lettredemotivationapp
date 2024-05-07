<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2">
    <div class="max-w-full">
        <div class="mx-6 sm:mx-12 xl:mx-24 mt-6 px-6 py-3 xl:px-8 xl:py-4 text-gray-900 bg-white rounded-3xl border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
            <div class="flex flex-col sm:flex-row items-center justify-between">
                <div class="w-full sm:w-auto mb-2 sm:mb-0 sm:mr-4 flex-1 items-center">
                    <p class="ml-3 cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!} Pour plus d'informations sur notre politique en matière de cookies, veuillez consulter notre page <a
                            href="{{route('cookie')}}"
                            class="font-medium text-primary-600 dark:text-primary-500 hover:underline">dédiée</a>.
                    </p>
                </div>
                <div class="w-full sm:w-auto">
                    <button
                        class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-white bg-primary-600 w-full sm:w-auto">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

