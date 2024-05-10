<x-base-mail-layout subject="Demande de contact">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-12">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Nouveau message de {{ $contact_name }}
        </h1>
        <div class="mb-4 text-md">
            <ul class="list-disc">
                <li>Email: {{ $contact_email }}</li>
                <li>Sujet: {{ $contact_subject }}</li>
            </ul>
            <br>
            <br>
            {{ $contact_message }}
        </div>
    </div>
</x-base-mail-layout>
