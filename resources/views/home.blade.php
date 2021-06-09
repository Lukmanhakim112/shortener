<x-guest-layout>
    <div class="py-5 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mx-3 sm:mx-0 rounded-md overflow-hidden shadow-md sm:rounded-md">
                <div class="px-6 py-4 text-lg flex justify-between items-center" style="background: #DAB552">
                    <div>
                        {{ __("Shortener")  }}
                    </div>
                    <div>
                       @if (!(Auth::check()))
                           <x-link-button href="{{ route('register') }}">
                               {{ __("Sign Up")  }}
                           </x-link-button>
                           <x-link-button href="{{ route('login')  }}" class="bg-yellow-600 text-white">
                               {{ __('Login') }}
                           </x-link-button>
                       @else
                           <x-link-button href="{{ route('dashboard')  }}" class="bg-yellow-600 text-white">
                               {{ __('Dashboard') }}
                           </x-link-button>
                       @endif
                    </div>
                </div>

                <x-validation-errors class="mt-4 mx-6" :errors="$errors" />

                <div class="p-6">
                    <form method="POST">
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
                            <div class="mt-3 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm">
                                    {{ Request::url() }}/
                                </span>
                                <!-- <input type="text" name="company_website" id="company_website" cls="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com"> -->
                                <input id="alias" value="{{ old('alias') }}" class="flex-1 block w-full rounded-none rounded-r-md sm:text-sm shadow-sm border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" type="text" name="alias" />
                            </div>
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
