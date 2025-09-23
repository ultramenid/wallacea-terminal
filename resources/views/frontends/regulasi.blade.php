@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')
    @include('partials.infoterbaruIndex')
    @include('partials.navbar')
    <!-- category top -->
    <div class=" border-t border-kuning py-2 flex justify-center gap-12 font-light "> </div>
    <div class="max-w-6xl mx-auto sm:pt-20 px-4">
        <div class=" border-t-4 border-t-kuning " >
            <h1 class="text-4xl font-bold mt-2 px-4">Regulasi</h1>
        </div>
        <p class="mt-10 sm:text-xl text-sm px-4 mb-20">Laman ini berisi kajian kolaborasi antara Auriga dengan peneliti dan akademisi di wilayah yang mencakup wilayah Wallacea.
        </p>

        <div class="flex gap-6 w-full px-4 py-20">
            <div class="w-3/12 sm:flex hidden flex-col gap-4 py-2 border-t-4 border-kuning">
                <a>Minerba</a>
            </div>
            <div class="bg-gray-100 sm:w-9/12 w-full px-4  py-4 flex flex-col">
                <a href="https://drive.google.com/file/d/1kqifpGFReMcjX38-o6gHs2AGrKyuIHx7/view?usp=share_link" target="_blank" class="underline">Undang-Undang (UU) Nomor 3 Tahun 2020 tentang mineral dan batubara </a>
                <p class="px-20 mt-4 font-light text-sm">Dalam UU ini diatur mengenai penyempurnaan terhadap UU Nomor 4 Tahun 2009 tentang Pertambangan Mineral dan Batubara, yaitu menambahkan materi muatan baru berupa: (1) pengaturan terkait konsep Wilayah Hukum Pertambangan; (2) kewenangan pengelolaan Mineral dan Batubara; (3) rencana pengelolaan Mineral dan Batubara; (4) penugasan kepada lembaga riset negara, BUMN, BUMD, atau Badan Usaha untuk melakukan Penyelidikan dan Penelitian dalam rangka penyiapan WIUP; (5) penguatan peran BUMN; (6) pengaturan kembali perizinan dalam pengusahaan Mineral dan Batubara termasuk di dalamnya, konsep perizinan baru terkait pengusahaan batuan untuk jenis tertentu atau untuk keperluan tertentu, serta perizinan untuk pertambangan rakyat; dan (7) penguatan kebijakan terkait pengelolaan lingkungan hidup pada kegiatan usaha Pertambangan, termasuk pelaksanaan Reklamasi dan Pascatambang. Dalam Undang-Undang ini juga dilakukan pengaturan kembali terkait kebijakan peningkatan nilai tambah Mineral dan Batubara, divestasi saham, pembinaan dan pengawasan, penggunaan lahan, data dan informasi, Pemberdayaan Masyarakat, dan kelanjutan operasi bagi
                    pemegang Kontrak Kerja/KK atau Perjanjian Karya Pengusahaan Pertambangan Batubara/PKP2B.</p>
                <p class="text-sm px-20 mt-4 ">Undang-undang ini mengubah ketentuan: </p>
                <ul class="text-sm px-24  mb-12 list-disc gap-2 flex flex-col">
                    <li><a href="https://drive.google.com/file/d/1ECQjJ8GjD1vF8cTLvUMs_lG8cv9Sz4dn/view?usp=share_link" target="_blank" class="underline">UU Nomor 4 Tahun 2009 </a></li>
                    <li><a href="https://drive.google.com/file/d/1jca5RWiKkZYBFN9ZlziU0KWXJ0VUdTI8/view?usp=share_link" target="_blank" class="underline">UU Nomor 11 Tahun 1967 </a></li>
                </ul>


                <a class="">Regulasi Terkait</a>
                <a class=" underline text-sm px-10 mt-3" href="https://drive.google.com/file/d/1Fgujl0rKvNjCEX6vzGU4tHkNFkxXtJNG/view?usp=share_link" target="_blank" class="underline">Peraturan Pemerintah Nomor 96 Tahun 2021 Pelaksanaan Kegiatan Usaha Pertambangan Mineral dan Batubara</a>
                <p class="px-20 mt-3 font-light text-sm">PP ini mengatur mengenai: (1) rencana pengelolaan mineral dan batubara nasional; (2) perizinan berusaha di bidang pertambangan mineral dan batubara; (3) izin usaha pertambangan; (4) izin pertambangan rakyat; (5) izin usaha pertambangan khusus; (6) IUPK sebagai kelanjutan operasi kontrak/perjanjian; (7) surat izin penambangan batuan; (8) izin pengangkutan dan penjualan; (9) usaha jasa pertambangan; (10) perluasan dan penciutan WIUP dan WIUPK; (11) divestasi saham; (12) suspensi kegiatan usaha pertambangan; (13) pengutamaan kepentingan dalam negeri, pengendalian produksi, dan pengendalian penjualan mineral dan batubara; (14) peningkatan nilai tambah mineral dan batubara; (15) penggunaan jalan pertambangan; (16) penggunaan tanah untuk kegiatan usaha pertambangan; (17) rencana kerja dan anggaran biaya tahunan serta laporan; (18) pengembangan dan pemberdayaan masyarakat; (19) penjualan mineral dan batubara keadaan tertentu; dan (20) sanksi administratif.</p>
                <p class="text-sm px-20 mt-4 ">Peraturan Pemerintah ini mencabut: </p>
                <ul class="text-sm px-24  mb-12 list-disc gap-2 flex flex-col">
                    <li><a href="https://drive.google.com/file/d/1fY1OwhzsLSrV4motwzD-Jsf_evTMIehw/view?usp=share_link" target="_blank" class="underline">PP No. 1 Tahun 2017 tentang Perubahan Keempat atas Peraturan Pemerintah Nomor 23 Tahun 2010 tentang Pelaksanaan Kegiatan Usaha Pertambangan Mineral dan Batubara</a></li>
                    <li><a href="https://drive.google.com/file/d/1YgkuKrnH9dycIT1Eea6bbCC6FiSc-jQa/view?usp=share_link" target="_blank" class="underline">PP No. 77 Tahun 2014 tentang Perubahan Ketiga Atas Peraturan Pemerintah Nomor 23 Tahun 2010 Tentang Pelaksanaan Kegiatan Usaha Pertambangan Mineral Dan Batubara</a></li>
                    <li><a href="https://drive.google.com/file/d/12OjDfoxcVAbiaauyFMM8ss2gXLpKyptF/view?usp=share_link" target="_blank" class="underline">PP No. 1 Tahun 2014 tentang Perubahan Kedua Atas Peraturan Pemerintah Nomor 23 Tahun 2010 Tentang Pelaksanaan Kegiatan Usaha Pertambangan Mineral Dan Batubara</a></li>
                    <li><a href="https://drive.google.com/file/d/1OY5vimwa6YlpRQxO_LyucpyJdhZxCG4Z/view?usp=share_link" target="_blank" class="underline">PP No. 24 Tahun 2012 tentang Perubahan Atas Peraturan Pemerintah Nomor 23 Tahun 2010 Tentang Pelaksanaan Kegiatan Usaha Pertambangan Mineral Dan Batubara</a></li>
                    <li><a href="https://drive.google.com/file/d/1issa5rthy8OzRF0q1wD06dhOYU29wd5W/view?usp=share_link" target="_blank" class="underline">PP No. 23 Tahun 2010 tentang Pelaksanaan Kegiatan Usaha Pertambangan Mineral Dan Batu Bara</a></li>
                </ul>

                <a class=" underline text-sm px-10 mt-3" href="https://drive.google.com/file/d/1jKUsv5dWOGAmJmyzFrh0EC9fbkqact8u/view?usp=share_link" target="_blank" class="underline">Peraturan Menteri ESDM Nomor 10 Tahun 2023 Tata Cara Penyusunan, Penyampaian, dan Persetujuan Rencana Kerja dan Anggaran Biaya serta Tata Cara Pelaporan Pelaksanaan Kegiatan Usaha Pertambangan Mineral dan Batubara</a>
                <p class="px-20 mt-3 font-light text-sm">Pertambangan Migas, Mineral Dan Energi - Perizinan, Pelayanan Publik.</p>
                <p class="text-sm px-20 mt-4 ">Mencabut sebagian: </p>
                <ul class="text-sm px-24  mb-12 list-disc gap-2 flex flex-col">
                    <li><a href="https://drive.google.com/file/d/1zEowOvcgH_6X26EkuQvpPWOlPqkkOssF/view?usp=share_link" target="_blank" class="underline">"Peraturan Menteri ESDM Nomor 16 Tahun 2021 tentang Perubahan Atas Peraturan Menteri Energi Dan Sumber Daya
                        Mineral Nomor 7 Tahun 2020 Tentang Tata Cara Pemberian
                        Wilayah, Perizinan, Dan Pelaporan Pada Kegiatan Usaha
                        Pertambangan Mineral Dan Batubara"</a></li>
                    <li><a href="https://drive.google.com/file/d/18bkExDWLJRZGXGhtKAk_bVTCGGslJaIF/view?usp=share_link" target="_blank" class="underline">Peraturan Menteri Energi dan Sumber Daya Mineral Nomor 51 Tahun 2018 tentang Perubahan Kedua Atas Peraturan Menteri Energi Dan Sumber Daya Mineral Nomor 11 Tahun 2018 Tentang Tata Cara Pemberian Wilayah, Perizinan, Dan Pelaporan Pada Kegiatan Usaha Pertambangan Mineral Dan Batubara</a></li>
                    <li><a href="https://drive.google.com/file/d/1v0tiLYbP28Oxw_JBJ8FSiq40FteNhamg/view?usp=share_link" target="_blank" class="underline">Peraturan Menteri Energi dan Sumber Daya Mineral Nomor 22 Tahun 2018 tentang Perubahan Atas Peraturan Menteri Energi Dan Sumber Daya Mineral Nomor 11 Tahun 2018 Tentang Tata Cara Pemberian Wilayah, Perizinan, Dan Pelaporan Pada Kegiatan Usaha Pertambangan Mineral Dan Batubara</a></li>
                    <li><a href="https://drive.google.com/file/d/1ulWMv3SQpozUX3516Et3q-8Afw1cb-Gi/view?usp=share_link" target="_blank" class="underline">Peraturan Menteri Energi dan Sumber Daya Mineral Nomor 11 Tahun 2018 tentang Tata Cara Pemberian Wilayah, Perizinan, Dan Pelaporan Pada Kegiatan Usaha Pertambangan Mineral Dan Batubara</a></li>

                </ul>
            </div>
        </div>
    </div>




    @include('partials.footer')
@endsection
