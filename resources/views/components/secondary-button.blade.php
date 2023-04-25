<button {{ $attributes->merge(['type' => 'button', 'class' => 'items-center justify-center font-medium rounded-xl focus-visible:outline-black focus:outline-none inline-flex duration-200 text-black lg:w-auto px-6 py-3 text-center text-black/80 w-full border']) }}>
    {{ $slot }}
</button>
