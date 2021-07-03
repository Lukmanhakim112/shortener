<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="flex">
                <button class="addLink inline-flex items-center px-4 py-2 rounded font-semibold text-green-900 text-sm tracking-widest hover:bg-green-100 active:bg-green-500 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Add Link') }}
                </button>
                <x-acc-dropdown />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div id="addLinkForm" class="bg-white overflow-hidden shadow sm:rounded-md mb-3 p-5 opacity-0 hidden transition duration-200 ease-in-out">
                <form method="POST" action="{{ route('insert-link')  }}">
                    @csrf

                    <input type="hidden" name="origin" value="dashboard" />

                    <div class="flex flex-row-reverse mb-5">
                        <button type="button"  class="addLink inline-flex items-center px-4 py-2 rounded font-semibold text-green-900 text-sm tracking-widest hover:bg-green-100 active:bg-green-500 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                            </svg>
                        </button>
                    </div>

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
                                {{ url("/") }}/
                            </span>
                            <!-- <input type="text" name="company_website" id="company_website" cls="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com"> -->
                            <input id="alias" value="{{ old('alias') }}" class="flex-1 block w-full rounded-none rounded-r-md sm:text-sm shadow-sm border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" type="text" name="alias" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button type="submit" class="ml-3">
                            {{ __('Short Me!') }}
                        </x-button>
                    </div>

                </form>
            </div>


            <div class="bg-white overflow-hidden shadow sm:rounded-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex" style="height: calc(100vh - 15rem)">
                        <div class="w-1/4 mr-3" style="overflow: auto;">
                            @foreach ($links as $link)
                            <button id="link-{{ $loop->index }}" class="link py-5 text-left px-3 w-full block text-md hover:bg-gray-100">
                                {{ url("/")."/".$link->alias  }}
                            </button>
                            @endforeach
                        </div>
                        <div class="w-3/4">
                            @foreach ($links as $link)
                            <div class="link-detail px-5 w-full h-full py-3 grid grid-cols-2 grid-rows-3 gap-12 grid-flow-col
                                        @if ($loop->first)
                                        block
                                        @else
                                        hidden
                                        @endif
                                        " id="detail-link-{{ $loop->index }}">
                                <div class="text-lg">
                                    <span class="text-gray-600">Original Link</span> <br />
                                    @start_with_http($link->real_link)
                                    <a href="{{ "http://".$link->real_link  }}">{{ $link->real_link  }}</a>
                                    @else
                                    <a href="{{ $link->real_link  }}">{{ $link->real_link  }}</a>
                                    @endstart_with_http
                                </div>
                                <div class="text-lg">
                                    <span class="text-gray-600">Click Counter</span> <br />
                                    {{ $link->hit_count  }} times clicked
                                </div>
                                <div class="text-lg">
                                    <span class="text-gray-600">Created At</span> <br />
                                    {{ $link->created_at  }}
                                </div>
                                <div class="text-lg row-span-3">
                                    <form method="POST" action="{{ route("delete-link")  }}">
                                        @csrf

                                        <input type="hidden" name="alias" value="{{ $link->alias }}" />

                                        <x-button type="submit" color="red" class="ml-3">
                                            {{ __('Delete') }}
                                        </x-button>

                                        <x-button id="copy-button-{{ $loop->index }}" type="button" color="green" class="copy-button ml-1">
                                            {{ __('Copy Shorted Link') }}
                                        </x-button>

                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
     const old_check_box = "{{ old('custom')  }}";
    </script>

    <script type="text/javascript" src="{{ asset("js/dashboard.js")  }}"></script>
    <script type="text/javascript" src="{{ asset('js/shortener.js') }}"></script>
</x-app-layout>
