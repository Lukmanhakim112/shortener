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
                                    <span class="text-gray-600">Created At</span> <br />
                                    {{ $link->created_at  }}
                                </div>
                                <div class="text-lg">
                                    <span class="text-gray-600">Times Clicked</span> <br />
                                    {{ $link->hit_count  }} times clicked
                                </div>
                                <div class="text-lg row-span-3">
                                    <form method="POST" action="{{ route("delete-link")  }}">
                                        @csrf

                                        <input type="hidden" name="alias" value="{{ $link->alias }}" />

                                        <x-button type="submit" color="red" class="ml-3">
                                            {{ __('Delete') }}
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

    <script type="text/javascript" src="{{ asset("js/dashboard.js")  }}"></script>
</x-app-layout>
