<button {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center justify-center font-medium rounded-xl focus-visible:outline-black focus:outline-none inline-flex bg-black border-2 border-black duration-200 focus-visible:ring-black hover:bg-transparent hover:border-black hover:text-black lg:w-auto px-6 py-3 text-center text-white w-full']) }}>
    {{ $slot }}
</button>
