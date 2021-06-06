<button {{ $attributes->merge(['type' => 'button', 'style' => 'background: #E09336', 'class' => 'inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-white tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
