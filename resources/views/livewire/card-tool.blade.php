<div>
    <article
        class="relative group cursor-pointer flex flex-col max-w-[320px] w-full min-w-[300px] h-[420px] rounded-2xl border-4 border-gray-200 hover:border-[#343C53] add-to-cart"
        data-id="{{ $filter == 'material' ? $detail->material->id : $detail->tool->id }}" {{-- ID item --}}
        data-type="{{ $filter == 'material' ? 'material' : 'tool' }}" tabindex="0">
        <img src="/assets/img/Rectangle 2.png" alt="" class=" w-full h-[50%] object-cover rounded-xl">
        <section
            class="absolute top-0 left-0 w-full h-[50%] rounded-xl flex flex-col justify-center items-center p-8 text-center text-3xl font-bold text-white"
            style="background: linear-gradient(180deg, #343c531b 5%, #F25E5E 110%);">
            @if ($filter == 'material')
                {{ $detail->material->material_name }}
            @else
                {{ $detail->tool->tool_name }}
            @endif
        </section>
        <div class="w-full h-full rounded-xl flex flex-col justify-between text-lg font-semibold text-[#343C53] p-4">
            <div class="w-full h-full flex flex-col gap-2">
                @if ($filter == 'material')
                    <p>
                        Karakter: {{ $detail->material->character }}
                    </p>
                    <p class="h-12 text-base truncate">
                        {{ $detail->material->condition }}
                    </p>
                    <p class="text-xl font-bold">
                        Stok {{ $detail->material->stocks }} Unit
                    </p>
                @else
                    <p>
                        Merk Barang: {{ $detail->tool->merk }}
                    </p>
                    <p>
                        Kondisi Barang:
                        <span class="font-bold">
                            {{ $detail->tool->condition }}
                        </span>
                    </p>
                    <p class="text-xl font-bold">
                        Stok {{ $detail->tool->stocks }} Unit
                    </p>
                @endif
            </div>
            <div class="flex justify-end w-full">
                <button
                    class="justify-center self-center px-3 py-1 text-lg text-white whitespace-nowrap bg-[#F25E5E] rounded-full max-md:px-5 max-md:mt-10 group-hover:bg-[#343C53]">
                    {{-- Tipe item --}}
                    PINJAM
                </button>
            </div>
        </div>
    </article>
</div>
