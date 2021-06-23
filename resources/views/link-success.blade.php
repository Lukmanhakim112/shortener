<x-guest-layout>
    <style type="text/css" media="screen">
     .hidden {
         opacity: 0;
     }
     #alert-copied {
         opacity: 1;
         transition: opacity 1s;
     }
    </style>

    <div class="py-5 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-md">
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

                <div class="p-6">

                    <div id="alert-copied" class="transition duration-500 ease-in-out rounded-md bg-green-300 px-5 py-3 font-bold hidden">
                        Coppied!
                    </div>

                    <div style="background: #fce7ae" class="rounded-md p-5 my-3 items-center text-md flex">
                        <div class="flex-auto flex-grow" id="shortened">
                            {{ Request::url()."/".$alias  }}
                        </div>
                        <div>
                            <x-button-brown id="copy-button">
                                <!-- <x-clipboard-logo class="mr-1" /> -->
                                {{__("Copy")}}
                            </x-button-brown>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
     document.getElementById("copy-button")
             .onclick = function() {
                 let link = document.getElementById("shortened").innerText;
                 const alert = document.getElementById("alert-copied");
                 navigator.clipboard.writeText(link)
                          .then(() => {
                              alert.classList.replace("hidden", "block")
                              setTimeout(function() {
                                  alert.classList.replace("block", "hidden")
                              }, 3000);
                          })
                          .catch(err => {
                              alert('Error in copying text: ', err);
                          });
             }
    </script>


</x-guest-layout>
