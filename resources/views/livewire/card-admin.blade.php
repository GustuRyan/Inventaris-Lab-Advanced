<div>
    <article
        class="relative group flex flex-col max-w-[320px] w-full h-[420px] rounded-2xl border-4 border-gray-200 hover:border-[#343C53] add-to-cart">
        <img src="/assets/img/Rectangle 2.png" alt="" class=" w-full h-[50%] object-cover rounded-xl">
        <section
            class="absolute top-0 left-0 w-full h-[50%] rounded-xl flex flex-col justify-center items-center p-8 text-center text-3xl font-bold text-white"
            style="background: linear-gradient(180deg, #343c531b 5%, #F25E5E 110%);">
            @if ($filter == 'material')
                {{ $detail->material_name }}
            @else
                {{ $detail->tool_name }}
            @endif
        </section>
        <div
            class="w-full h-full rounded-xl flex flex-col justify-between text-lg font-semibold text-[#343C53] pt-4 px-4">
            <div class="w-full h-full flex flex-col gap-2">
                @if ($filter == 'material')
                    <p>
                        Karakter: {{ $detail->character }}
                    </p>
                    <p class="h-12 text-base truncate">
                        {{ $detail->condition }}
                    </p>
                @else
                    <p>
                        Merk Barang: {{ $detail->merk }}
                    </p>
                    <p>
                        Kondisi Barang:
                        <span class="font-bold">
                            {{ $detail->condition }}
                        </span>
                    </p>
                @endif
            </div>
        </div>
        <div class="flex justify-end gap-3 p-4">
            @if ($filter == 'material')
                <a href="{{ route('admin.alat-bahan.update', ['id' => $detail->id, 'filter' => $filter]) }}"
                    class="w-10 h-10 rounded-full bg-[#F7C443] flex justify-center items-center hover:bg-[#dfb13d]">
                    <img src="/icons/icon_edit.svg" alt="" class="w-5 h-5">
                </a>
                <form action="{{ route('materials.destroy', ['id' => $detail->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-10 h-10 rounded-full bg-bold-red flex justify-center items-center hover:bg-[#c43f51]">
                        <img src="/icons/icon_delete.svg" alt="" class="w-5 h-5">
                    </button>
                </form>
            @else
                <a href="{{ route('admin.alat-bahan.update', ['id' => $detail->id, 'filter' => $filter]) }}"
                    class="w-10 h-10 rounded-full bg-[#F7C443] flex justify-center items-center hover:bg-[#dfb13d]">
                    <img src="/icons/icon_edit.svg" alt="" class="w-5 h-5">
                </a>
                <form action="{{ route('tools.destroy', ['id' => $detail->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-10 h-10 rounded-full bg-bold-red flex justify-center items-center hover:bg-[#c43f51]">
                        <img src="/icons/icon_delete.svg" alt="" class="w-5 h-5">
                    </button>
                </form>
            @endif
        </div>        
    </article>
</div>
