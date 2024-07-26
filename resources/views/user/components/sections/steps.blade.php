<section class="h-screen w-full flex flex-col justify-center items-center gap-16"
    style="background: linear-gradient(180deg, #41589A 0%, #162140 100%);">
    <div class="w-[700px] flex flex-col gap-4 text-center">
        <h1 class="text-[28px] font-bold font-rhodium text-white">
            Berbagai Fitur Pengelolaan Laboratorium
        </h1>
        <p class="text-xl text-[#D0D8F1]">
            Dengan tujuan utama sebagai website penyedia layanan manajemen seluruh kegiatan yang ada pada Laboratorium
            Universitas Udayana
        </p>
    </div>
    <div class="w-full flex items-center pl-[78px] overflow-x-scroll scrollbar-hide gap-14">
        @for ($i = 0; $i < 5; $i++)
            <card class="flex flex-col gap-6">
                <div class="flex flex-col items-center relative w-[334px] h-[324px]">
                    <img class="w-[240px] h-[290px] rounded-xl border-2 shadow-xl z-20 object-cover"
                        src="/assets/img/hero1.png" alt="">
                    <div class="absolute top-40 w-[304px] h-[164px]"
                        style="background: linear-gradient(73deg, #F25E5E 6.56%, #FA9C9C 95.69%); border-radius: 12px 12px 24px 24px;">
                    </div>
                </div>
                <div class="flex flex-col items-center text-white text-center w-[334px] gap-3">
                    <h2 class="font-bold text-2xl">
                        Berbagai Fitur
                    </h2>
                    <p class="text-lg text-[#D0D8F1]">
                        Dengan tujuan sebagai penyedia layanan manajemen semua kegiatan laboratorium
                    </p>
                </div>
            </card>
        @endfor
    </div>
</section>
