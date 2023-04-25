<button {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center justify-center font-medium rounded-xl focus-visible:outline-red-600 focus:outline-none inline-flex bg-red-600 border-2 border-red-600 duration-200 focus-visible:ring-red-600 hover:bg-transparent hover:border-red-600 hover:text-black lg:w-auto px-6 py-3 text-center text-white w-full']) }}>
    {{ $slot }}
</button>
