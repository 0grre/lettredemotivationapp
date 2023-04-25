<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('create first letter') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('letter.generate') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="prompt" :value="__('Current Password')" />
            <x-text-input id="prompt" name="prompt" type="text" class="mt-1 block w-full" autocomplete="current-password" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Générer') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    @isset($text)
        <p>

        </p>
        <pre>
            {{$text}}
        </pre>
    @endif
</section>
