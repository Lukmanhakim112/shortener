<x-guest-layout>
    <div class="py-5 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-md">
                <div class="px-6 py-4 text-lg flex justify-between items-center" style="background: #DAB552">
                    <div>
                        {{ __("Shortener")  }}
                    </div>
                    <div>
                        <x-link-button href="{{ route('register') }}">
                            {{ __("Sign Up")  }}
                        </x-link-button>
                        <x-link-button href="{{ route('login')  }}" class="bg-yellow-600 text-white">
                            {{ __('Login') }}
                        </x-link-button>
                    </div>
                </div>

                <x-validation-errors class="mt-4 mx-6" :errors="$errors" />

                <div class="p-6">
                    <form method="POST" action="{{-- route('login') --}}">
                        @csrf

                        <div>
                            <x-input id="link" placeholder="Long Url Here..." value="{{ old('link') }}" class="block mt-1 w-full" type="text" name="link" required autofocus />
                        </div>

                        <!-- Check Box -->
                        <div class="block mt-4">
                            <label for="custom_link" class="inline-flex items-center">
                                <input id="custom_link" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="custom">
                                <span class="ml-2 text-sm  font-bold">{{ __('Custom Link (Alias)') }}</span>
                            </label>
                        </div>

                        <div class="" id="alias_block" style="display: none">
                            <!-- <x-label for="alias" :value="__('Custom Link (Alias)')" /> -->
                            <x-input id="alias" class="mt-1 border-0 w-auto shadow-none px-0" type="text" value="{{ Request::url() }}/" disabled />
                            <x-input id="alias" value="{{ old('alias') }}" class="mt-1 w-1/2" type="text" name="alias" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Short Me!') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
     const old_check_box = "{{ old('custom')  }}";
    </script>

    <script type="text/javascript" src="{{ asset('js/shortener.js') }}"></script>
</x-guest-layout>
