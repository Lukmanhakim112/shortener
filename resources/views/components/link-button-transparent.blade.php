<a {{ $attributes->merge(['href' => '/', 'class' => 'inline-flex items-center px-4 py-2 bg-transparent text-green-800 border border-transparent rounded-md font-semibold text-sm tracking-widest hover:bg-green-100 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
