<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 mx-3 mt-4 sm:mx-0 sm:mt-0">

    <div class="w-full sm:max-w-md bg-white shadow-md overflow-hidden rounded sm:rounded-md">

        <div {{ $attributes->merge(['style' => 'background: #DAB552', 'class' => 'px-6 text-xl py-4 text-center tracking-wide'])}}>
            {{ $header ?? ''  }}
        </div>

        <div class="px-6 py-8">
            {{ $slot }}
        </div>
    </div>

    <div class="my-3 grid grid-cols-8 gap-3">
        <div>
            <a class="text-yellow-700 font-bold hover:text-yellow-900" href="/">
                {{ __('Home') }}
            </a>
        </div>
    </div>

</div>
