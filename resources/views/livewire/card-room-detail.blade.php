<div>
    <article
        class="relative group flex flex-col max-w-[320px] w-full h-[560px] rounded-2xl border-4 border-gray-200 hover:border-[#343C53] ">
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
        <div class="w-full h-full rounded-xl flex flex-col justify-between font-semibold text-[#343C53] pt-4 px-4">
            <form action="{{ route('room_details.update', ['room' => $detail->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="w-full h-fit flex flex-col gap-2">
                    @if ($filter == 'material')
                        <p>
                            Karakter: {{ $detail->material->character }}
                        </p>
                        <p class="text-base truncate">
                            {{ $detail->material->condition }}
                        </p>
                        <div class="w-full flex justify-between">
                            <div class="flex flex-col text-center w-[45%]">
                                <label for="total_stocks" class="font-bold">Stok <br>Total:</label>
                                <input type="number" name="total_stocks" id="total_stocks"
                                    value="{{ $detail->total_stocks }}"
                                    class="border border-gray-300 rounded p-2 text-center" required>
                            </div>
                            <div class="flex flex-col text-center w-[45%]">
                                <label for="current_stocks" class="font-bold">Stok Sekarang:</label>
                                <input type="number" name="current_stocks" id="current_stocks"
                                    value="{{ $detail->current_stocks }}"
                                    class="border border-gray-300 rounded p-2 text-center" required>
                            </div>
                        </div>
                        <p class="text-base truncate">
                            Barang dipinjam = {{ $detail->total_stocks - $detail->current_stocks }}
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
                        <div class="w-full flex justify-between">
                            <div class="flex flex-col text-center w-[45%]">
                                <label for="total_stocks" class="font-bold">Stok <br>Total:</label>
                                <input type="number" name="total_stocks" id="total_stocks"
                                    value="{{ $detail->total_stocks }}"
                                    class="border border-gray-300 rounded p-2 text-center" required>
                            </div>
                            <div class="flex flex-col text-center w-[45%]">
                                <label for="current_stocks" class="font-bold">Stok Sekarang:</label>
                                <input type="number" name="current_stocks" id="current_stocks"
                                    value="{{ $detail->current_stocks }}"
                                    class="border border-gray-300 rounded p-2 text-center" required>
                            </div>
                        </div>
                        <p class="text-base truncate">
                            Barang dipinjam = {{ $detail->total_stocks - $detail->current_stocks }}
                        </p>
                    @endif
                </div>
                <div class="flex justify-between mt-4">
                    <button type="submit"
                        class="px-2 w-fit h-10 rounded-full bg-[#F7C443] flex justify-center items-center text-white hover:bg-[#dfb13d]">
                        <img src="/icons/icon_edit.svg" alt="" class="w-5 h-5">
                        <span class="ml-2">
                            Simpan
                        </span>
                    </button>
                    <form action="{{ route('room_details.destroy', ['room' => $detail->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-10 h-10 rounded-full bg-bold-red flex justify-center items-center hover:bg-[#c43f51]">
                            <img src="/icons/icon_delete.svg" alt="" class="w-5 h-5">
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </article>
</div>
