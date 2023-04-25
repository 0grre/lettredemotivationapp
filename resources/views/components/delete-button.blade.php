<button {{ $attributes->merge(['type' => 'button', 'class' => 'items-center justify-center font-medium rounded-xl focus-visible:outline-red-500 focus:outline-none inline-flex bg-red-500 border-2 border-red-500 duration-200 focus-visible:ring-red-500 hover:bg-transparent hover:border-red-500 hover:text-red-500 lg:w-auto px-6 py-3 text-center text-white w-full']) }}>
    {{ $slot }}
</button>
