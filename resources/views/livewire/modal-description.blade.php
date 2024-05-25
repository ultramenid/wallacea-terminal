
<div x-data="{open: $wire.entangle('show')}">
    <div class="fixed z-50 inset-0 overflow-y-auto"  x-show="open" x-transition x-cloak style="display: none !important">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity ">
                <div class="absolute inset-0 bg-gray-500  ease-out duration-400 opacity-50"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

            <div class="inline-block align-bottom pt-10 pb-5 bg-white z-50  rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full " role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="flex flex-col px-4">
                    <h1 class="text-2xl">{{$title}}</h1>
                    <p class="font-light text-sm mt-3">{{$description}}</p>
                    <div class="flex w-full gap-4 mt-2">
                        <p class="font-light text-sm"><a class="font-semibold">Sumber:</a> {{$sumber}}</p>
                        <p class="font-light text-sm"><a class="font-semibold">Tahun:</a> {{$tahun}}</p>
                        <p class="font-light text-sm"><a class="font-semibold">Skala:</a> {{$skala}}</p>
                    </div>
                    <p class="font-light text-sm mt-2 focus:outline-none outline-none"><a class="font-semibold">Wali data:</a> {{$walidata}}</p>
                </div>

                <div class="w-full flex justify-end mt-4 px-4 ">
                    <button wire:click='closeDelete' class="bg-black px-4 py-1 text-white text-xs">close</button>
                </div>
            </div>
        </div>
    </div>
</div>
