<x-guest-layout>
    <div class="py-5 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-md">
                <div class="p-6 text-lg" style="background: #DAB552">
                    Shortener
                </div>

                <div class="p-6">

                    <div id="alert-copied" class="transition duration-500 ease-in-out rounded-md bg-green-300 px-5 py-3 font-bold" style="display: none">
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
                              alert.style.display = 'block';
                              setTimeout(function() {
                                  alert.style.display = 'none';
                              }, 3000);
                          })
                          .catch(err => {
                              alert('Error in copying text: ', err);
                          });
             }
    </script>


</x-guest-layout>
