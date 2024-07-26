@extends('user.layouts.dashboard')
@section('page')
    Peminjaman
@endsection
@section('contents')
    <div x-data="{ open: false }">
        <h1 class="font-bold text-2xl">
            <div class="relative flex flex-col px-16 py-20 bg-white">
                <div class="p-20 max-md:p-5">
                    <div class="bg-red-400 text-white p-5 mb-5 rounded-lg flex items-center justify-between">
                        <div class="flex">
                            <div class="h-[40px] w-[40px] rounded-lg bg-slate-700"></div>
                            <h1 class="px-4 py-2 text-2x1 font-bold text-white ml-4">Peminjaman</h1>
                        </div>
                        <button x-on:click="open = !open" class="px-4 py-2 bg-white rounded-xl text-[#F25E5E]">Lihat
                            Riwayat</button>
                    </div>
                    @if ($transactions != null)
                        <section x-show="open" @click.away="open = false" x-cloak
                            class="bg-white rounded-xl border-2 shadow-lg w-full h-full flex p-4 mb-8">
                            <div class="flex flex-col overflow-y-scroll w-full h-full scrollbar-hide gap-4">
                                <span>
                                    Riwayat Transaksi
                                </span>
                                @foreach ($transactions as $trans)
                                    <card class="flex flex-col gap-4 border-2 rounded-xl p-4">
                                        <div
                                            class="w-full h-full flex justify-between items-center bg-[#343C53] rounded-xl p-4 text-white">
                                            <p class="text-xl">
                                                {{ $trans->user->name }}
                                                <br>
                                                {{ $trans->user->phone }}
                                            </p>
                                            <div class="flex gap-4 text-lg">
                                                <p class="w-44">
                                                    Tanggal Meminjam: {{ $trans->borrow_date }}
                                                </p>
                                                <p class="w-44">
                                                    Harus Dikembalikan: {{ $trans->return_date }}
                                                </p>
                                            </div>
                                            <p class="bg-white px-4 py-2 rounded-xl text-[#343C53] text-xl">
                                                Status: {{ $trans->status }}
                                            </p>
                                            <a href="{{ route('laporan.trans', $trans->id) }}"
                                                class="w-[224px] h-full flex justify-between items-center px-4 py-2 bg-[#f25e5e] text-white text-xl font-bold rounded-xl shadow-xl cursor-pointer hover:opacity-80">
                                                <span>
                                                    Download Nota
                                                </span>
                                                <img class="w-8 h-8" src="/assets/img/Bidownload.png" alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="w-full h-full overflow-x-scroll flex border-2 border-[#343C53] rounded-xl p-4 scrollbar-hide gap-3">
                                            @foreach ($details as $detail)
                                                <div
                                                    class="w-full px-4 py-2 bg-[#F25E5E] rounded-xl text-white font-bold flex items-center">
                                                    @if ($detail->material_id != 0)
                                                        {{ $detail->material->material_name }}
                                                    @else
                                                        {{ $detail->tool->tool_name }}
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </card>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    @php
                        $user = Auth::user();

                        $materials = $cartData->where('material_id', '!=', 0);
                        $tools = $cartData->where('tool_id', '!=', 0);
                    @endphp
                    @auth
                        <form action="{{ route('trans.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="dipinjam">
                            <div class="grid grid-cols-2 gap-5">
                                <div class="flex flex-col mb-5">
                                    <label for="tanggal_peminjaman" class="font-bold text-slate-700 mb-2.5">Nama
                                        Peminjam</label>
                                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                                    <input type="text" id="nama" name="nama" value="{{ $user->name }}"
                                        class="p-3 border border-black text-base rounded-md">
                                </div>
                                <div class="flex flex-col mb-5">
                                    <label for="tanggal_pengembalian" class="font-bold text-slate-700 mb-2.5">Nomor Telepon
                                        Peminjam</label>
                                    <input type="text" id="tanggal_pengembalian" name="tanggal_pengembalian"
                                        value="{{ $user->phone }}" class="p-3 border border-black text-base rounded-md">
                                </div>

                                <label for="material" class="col-span-2">
                                    Daftar Bahan-Bahan Pada Keranjang
                                </label>
                                <div class="col-span-2 flex w-full overflow-x-scroll scrollbar-hide gap-8">
                                    @foreach ($materials as $materialIndex => $material)
                                        <input type="hidden" name="details[{{ $materialIndex }}][material_id]"
                                            value="{{ $material->material->id }}">
                                        <input type="hidden" name="details[{{ $materialIndex }}][amount]"
                                            value="{{ $material->amount }}">
                                        <input type="hidden" name="details[{{ $materialIndex }}][tool_id]" value="0">
                                        <article class="flex flex-col w-[300px] max-md:ml-0 max-md:w-full">
                                            <section
                                                class="flex overflow-hidden relative flex-col grow justify-center text-center aspect-[0.67] max-md:mt-10">
                                                <img loading="lazy" src="/assets/img/Rectangle 2.png"
                                                    class="object-cover absolute inset-0 size-full" alt="Image description" />
                                                <div class="flex relative flex-col px-9 pb-14 rounded-2xl max-md:px-5"
                                                    style="background: linear-gradient(180deg, rgba(140, 54, 54, 0.00) 0%, #F25E5E 89.5%); height: 100%;">
                                                    <h3 class="mt-12 text-xl font-bold text-white max-md:mt-10">
                                                        {{ $material->material->id }}
                                                        <br>
                                                        {{ $material->material->material_name }}
                                                        <br>
                                                        {{ $material->material->character }}
                                                        <br><br>
                                                        {{ $material->material->condition }}
                                                    </h3>
                                                    <div class="justify-center self-center pl-12 pr-6 py-2 mt-12 text-lg text-red-400 whitespace-nowrap bg-white rounded-3xl max-md:px-5 max-md:mt-10"
                                                        tabindex="0">
                                                        Jumlah = <input class="w-12" type="number"
                                                            name="details[{{ $materialIndex }}][amount]"
                                                            value="{{ $material->amount }}">
                                                    </div>
                                                </div>
                                            </section>
                                        </article>
                                    @endforeach
                                </div>

                                <label for="material" class="col-span-2">
                                    Daftar Alat-Alat Pada Keranjang
                                </label>
                                <div class="col-span-2 flex w-full overflow-x-scroll scrollbar-hide gap-8">
                                    @foreach ($tools as $toolIndex => $tool)
                                        <input type="hidden" name="details[{{ count($materials) + $toolIndex }}][tool_id]"
                                            value="{{ $tool->tool->id }}">
                                        <input type="hidden" name="details[{{ count($materials) + $toolIndex }}][amount]"
                                            value="{{ $tool->amount }}">
                                        <input type="hidden" name="details[{{ count($materials) + $toolIndex }}][material_id]"
                                            value="0">
                                        <article class="flex flex-col w-[300px] max-md:ml-0 max-md:w-full">
                                            <section
                                                class="flex overflow-hidden relative flex-col grow justify-center text-center aspect-[0.67] max-md:mt-10">
                                                <img loading="lazy" src="/assets/img/Rectangle 2.png"
                                                    class="object-cover absolute inset-0 size-full" alt="Image description" />
                                                <div class="flex relative flex-col px-9 pb-14 rounded-2xl max-md:px-5"
                                                    style="background: linear-gradient(180deg, rgba(140, 54, 54, 0.00) 0%, #F25E5E 89.5%); height: 100%;">
                                                    <h3 class="mt-12 text-xl font-bold text-white max-md:mt-10">
                                                        {{ $tool->tool->id }}
                                                        <br>
                                                        {{ $tool->tool->tool_name }}
                                                        <br>
                                                        {{ $tool->tool->merk }}
                                                        <br><br>
                                                        Kondisi {{ $tool->tool->condition }}
                                                    </h3>
                                                    <div class="justify-center self-center pl-12 pr-6 py-2 mt-12 text-lg text-red-400 whitespace-nowrap bg-white rounded-3xl max-md:px-5 max-md:mt-10"
                                                        tabindex="0">
                                                        Jumlah = <input class="w-12" type="number"
                                                            name="details[{{ count($materials) + $toolIndex }}][amount]"
                                                            value="{{ $tool->amount }}">
                                                    </div>
                                                </div>
                                            </section>
                                        </article>
                                    @endforeach
                                </div>
                                <div class="flex flex-col mb-5">
                                    <label for="tanggal_peminjaman" class="font-bold text-slate-700 mb-2.5">Tanggal
                                        Peminjaman</label>
                                    <input type="date" id="tanggal_peminjaman" name="borrow_date"
                                        class="p-3 border border-black text-base rounded-md">
                                </div>
                                <div class="flex flex-col mb-5">
                                    <label for="tanggal_pengembalian" class="font-bold text-slate-700 mb-2.5">Rencana
                                        Pengembalian</label>
                                    <input type="date" id="tanggal_pengembalian" name="return_date"
                                        class="p-3 border border-black text-base rounded-md">
                                </div>
                            </div>
                            <div class="felx justify-end">

                            </div>
                            <button type="submit"
                                class="mt-5 bg-red-400 text-white text-xl font-bold py-4 px-10 rounded-lg hover:bg-red-500 transition duration-300">SIMPAN</button>
                        </form>
                    @endauth
                </div>
            </div>
        </h1>
    </div>
@endsection
