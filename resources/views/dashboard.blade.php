<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div>
                <x-acc-dropdown />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex" style="height: calc(100vh - 15rem)">
                        <div class="w-1/4 mr-3" style="overflow: auto;">
                            @foreach ($links as $link)
                            <button id="link-{{ $loop->index }}" class="link py-5 text-left px-3 w-full block text-md hover:bg-gray-100">
                                {{ url("/")."/".$link->alias  }}
                            </button>
                            @endforeach
                        </div>
                        <div class="w-2/3">
                            @foreach ($links as $link)
                            <div class="link-detail
                                        @if ($loop->first)
                                        block
                                        @else
                                        hidden
                                        @endif
                                        " id="detail-link-{{ $loop->index }}">
                                {{ $link->real_link  }}
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset("js/dashboard.js")  }}"></script>
</x-app-layout>
