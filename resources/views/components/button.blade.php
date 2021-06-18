@props(['type' => 'button', 'submit', 'color' => 'green', 'yellow', 'red'])

<button {{ $attributes->merge(['type' => $type, 'class' => "inline-flex items-center px-4 py-2 bg-{$color}-600 border border-transparent rounded font-semibold text-sm text-white tracking-widest hover:bg-{$color}-700 active:bg-{$color}-900 focus:outline-none focus:border-{$color}-900 focus:ring ring-{$color}-300 disabled:opacity-25 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</button>
