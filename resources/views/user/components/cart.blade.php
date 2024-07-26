<div x-data="{ open: false }">
    @auth
        <section x-show="!open" class="fixed z-50 w-[280px] h-[52px] bottom-0 right-8">
            @if (count($cartData) > 0)    
            <div class="w-4 h-4 bg-green-500 rounded-full absolute right-[-4px] top-[-6px] opacity-100 animate-ping z-[60]">
            </div>
            <div class="w-4 h-4 bg-green-500 rounded-full absolute right-[-4px] top-[-6px] opacity-100 z-[60]"></div>
            @endif
            <card x-on:click="open = !open" id="hoverCart"
                class="fixed z-50 w-[280px] h-[52px] bg-[#F25E5E] rounded-t-xl bottom-0 right-8 shadow-xl opacity-50">
                <div class="h-full flex items-center justify-between px-4">
                    <div class="rounded-full bg-white w-[36px] h-[36px] flex justify-center items-center">
                        <img src="/assets/img/CartShopping.png" alt="" class=" h-auto w-[24px] object-cover">
                    </div>
                    <div class="font-bold text-white text-xl flex items-center gap-3">
                        <p class="border-r-[3px] px-3 h-[24px]">
                            {{ count($cartData->where('material_id', '!=', 0)) }} Bahan
                        </p>
                        <p class="h-[24px]">
                            {{ count($cartData->where('tool_id', '!=', 0)) }} Alat
                        </p>
                    </div>
                </div>
            </card>
        </section>


        <section x-show="open" @click.away="open = false" x-cloak
            class="fixed z-50 w-[480px] h-[572px] rounded-2xl bottom-8 right-8 bg-[#F25E5E] shadow-xl p-6">
            <div class="w-full h-full bg-white rounded-xl shadow-lg">
                <p
                    class="h-[72px] p-6 text-xl text-[#343C53] font-bold flex justify-between items-center sticky top-0 bg-white rounded-t-xl">
                    Daftar Barang Dalam Keranjang
                    <button x-on:click="open = !open" class="hover:opacity-70">
                        <img class="h-[24px] rounded-md" src="assets/img/Close.png" alt="">
                    </button>
                </p>
                <div class="w-full h-[428px] p-6 pt-0 flex flex-col gap-6 overflow-x-scroll scrollbar-hide">
                    @php
                        $materials = $cartData->where('material_id', '!=', 0);
                        $tools = $cartData->where('tool_id', '!=', 0);
                    @endphp
                    <p class="w-full font-bold text-center text-xl text-[#343C53] border-t-2 pt-6">Bahan-Bahan</p>
                    @foreach ($materials as $material)
                        <div class="w-full h-full flex items-center border-t-2 pt-6 justify-between">
                            <div class="flex items-center gap-3">
                                <img class="w-[88px] h-[88px] rounded-xl bg-[#343C53] p-2" src="/assets/img/SIIL-Light.svg"
                                    alt="">
                                <div class="flex flex-col text-lg font-bold text-[#343C53] gap-2">
                                    <p>
                                        {{ $material->material->material_name }}
                                    </p>
                                    <p class="opacity-70">
                                        <span class="border-r-2 border-[#343C53] pr-2">
                                            Material
                                        </span>
                                        <span class="px-3">
                                            {{ $material->material->character }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div
                                class="w-16 h-12 flex justify-center items-center border-2 border-[#343C53] px-2 rounded-xl">
                                {{ $material->amount }}
                            </div>
                        </div>
                    @endforeach
                    <p class="w-full font-bold text-center text-xl text-[#343C53] border-t-2 pt-6">Alat - Alat</p>
                    @foreach ($tools as $tool)
                        <div class="w-full h-full flex items-center justify-between border-t-2 pt-6">
                            <div class="flex items-center gap-3">
                                <img class="w-[88px] h-[88px] rounded-xl bg-[#343C53] p-2" src="/assets/img/SIIL-Light.svg"
                                    alt="">
                                <div class="flex flex-col text-lg font-bold text-[#343C53] gap-2">
                                    <p>
                                        {{ $tool->tool->tool_name }}
                                    </p>
                                    <p class="opacity-70">
                                        <span class="border-r-2 border-[#343C53] pr-2">
                                            Alat
                                        </span>
                                        <span class="px-3">
                                            {{ $tool->tool->merk }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div
                                class="w-16 h-12 flex justify-center items-center border-2 border-[#343C53] px-2 rounded-xl">
                                {{ $tool->amount }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    @endauth
</div>
<script>
    document.getElementById('hoverCart').addEventListener('mouseover', function() {
        this.style.opacity = '1';
    });

    document.getElementById('hoverCart').addEventListener('mouseout', function() {
        this.style.opacity = '0.7';
    });
</script>
