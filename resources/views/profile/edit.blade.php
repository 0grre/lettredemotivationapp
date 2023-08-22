<x-authenticated-layout>
    <div class="max-w-7xl mx-auto space-y-12 sm:px-6 lg:px-12">
        <div class="p-6 sm:p-12 bg-white rounded-3xl border border-gray-100 dark:bg-gray-800 dark:border-gray-600">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-6 sm:p-12 bg-white rounded-3xl border border-gray-100 dark:bg-gray-800 dark:border-gray-600">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-6 sm:p-12 bg-white rounded-3xl border border-gray-100 dark:bg-gray-800 dark:border-gray-600">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-authenticated-layout>


