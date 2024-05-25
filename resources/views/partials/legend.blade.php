
<div class="absolute top-2 rounded right-5 z-40"  >
    <div class="bg-white max-h-[90vh] bg-opacity-70 px-4 rounded mt-1 w-96 py-2 pb-12 overflow-y-auto scrollbar-hide"  >
        <div  class=" flex justify-between   items-center cursor-pointer" >
            <label  class="w-full mt-2 font-bold text-xl text-simontini">Legend </label>
        </div>


        <div class="px-2" style="display: none !important" x-show="legend" x-transition  :class="{'block': legend, 'hidden': !legend}" >
            <div class="flex flex-col py-4  text-sm border-b border-simontini" id="kawasanhutanlegend" style="color: black !important; display:none">
                <a class="text-xl  ">Kawasan Hutan</a>
                <div class="flex items-center space-x-2 mt-2">
                    <div class="h-4 w-4 bg-hpk"></div>
                    <a class="text-black">Hutan Produksi yang Dapat Dikonversi</a>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="h-4 w-4 bg-kk"></div>
                    <a class="text-black">Kawasan Konservasi</a>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="h-4 w-4 bg-hl"></div>
                    <a class="text-black">Hutan Lindung</a>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="h-4 w-4 bg-hpt"></div>
                    <a class="text-black">Hutan Produksi Terbatas</a>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="h-4 w-4 bg-hp"></div>
                    <a class="text-black">Hutan Produksi Tetap</a>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="h-4 w-4 bg-apl"></div>
                    <a class="text-black">Areal Penggunaan Lain</a>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="h-4 w-4 bg-tubuhair"></div>
                    <a class="text-black">Tubuh Air</a>
                </div>
            </div>







            <div class="flex flex-col py-4  text-sm border-b border-simontini" id="katonghabitatlegend" style="color: black !important; display:none">
                <a class="text-xl  ">Kantong Habitat</a>
                <div class="flex items-center space-x-2 mt-2">
                    <div class="h-4 w-4 border border-kantonghabitat"></div>
                    <a class="text-black">Kantong Habitat</a>
                </div>

            </div>

            <div class="flex flex-col  text-sm border-b border-simontini" id="administrasikabkotalegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="h-4 w-4 border border-black"></div>
                    <a class="text-black">Batas Administrasi Kab/Kota</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="pulaubesarlegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="h-4 w-4 border border-black"></div>
                    <a class="text-black">Pulau Besar Wallacea</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="pulaukecillegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="h-4 w-4 border border-black"></div>
                    <a class="text-black">Pulau Kecil Wallacea</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="provinsilegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="h-4 w-4 border border-black"></div>
                    <a class="text-black">Batas Administrasi Provinsi</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="biogegrafilegend" style="color: black !important; display:block">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 border border-b-biogeografi "></div>
                    <a class="text-black">Garis Biogeografi Wallacea</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="weberlegend" style="color: black !important; display:block">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 h-4  border-dotted border-2 border-t-weber border-b-weber "></div>
                    <a class="text-black">Garis Wallace & Weber</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="tambanglegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 h-4 bg-tambang "></div>
                    <a class="text-black">Tutupan Tambang</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="adatlegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 h-4 bg-adat "></div>
                    <a class="text-black">Peta Indikatif Wilayah Adat</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="ibbalegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 h-4 border border-ibba "></div>
                    <a class="text-black">IBBA</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="ppkhlegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 h-4 border border-ppkh "></div>
                    <a class="text-black">PPKH</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="iuplegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 h-4 border border-iup  "></div>
                    <a class="text-black">Izin Usaha Pertambangan</a>
                </div>
            </div>
            <div class="flex flex-col  text-sm border-b border-simontini" id="smelterlegend" style="color: black !important; display:none">
                <div class="flex items-center space-x-2 mt-2">
                    <div class="w-4 h-4 border border-smelter  "></div>
                    <a class="text-black">Smelter</a>
                </div>
            </div>
        </div>


    </div>
    <div class=" bottom-0  flex justify-center ">
        <div class="rounded-lg px-6 absolute -mt-4 z-40  bg-wallacea bg-opacity-90 text-center" @click="legend=!legend">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" stroke-width="0.1" stroke="none"  :class="{'rotate-180': legend, 'rotate-0': !legend}" class=" w-9 h-9 text-white transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>
        </div>
    </div>

</div>
