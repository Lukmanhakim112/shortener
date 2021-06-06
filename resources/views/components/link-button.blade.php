<a {{ $attributes->merge(['class' => 'inline-flex items-center mx-1 px-4 py-2 rounded-md text-sm font-semibold bg-yellow-300 tracking-widest hover:bg-yellow-500 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-100 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
