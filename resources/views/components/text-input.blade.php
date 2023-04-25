@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full focus:outline-none border py-3 appearance-none bg-slate-50 block border-slate-200 focus:bg-white focus:border-accent-500 focus:ring-accent-500 placeholder-slate-400 px-3 rounded-xl sm:text-sm text-accent-500']) !!}>
